<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Exception;

class SettingController extends Controller
{
    /**
     * Display the settings page with loaded data
     */
    public function index()
    {
        // Lấy toàn bộ settings và pluck ra dạng [key => value]
        $settings = DB::table('settings')->pluck('value', 'key')->all();
        
        return view('admin.settings', compact('settings'));
    }

    /**
     * Test connection to SQL Server with provided credentials
     */
    public function testDbConnection(Request $request)
    {
        $server = $request->input('server_name');
        $user = $request->input('db_user');
        $pass = $request->input('db_pass');
        $database = $request->input('db_name');

        try {
            // Bước 1: Kiểm tra PDO Drivers
            $drivers = PDO::getAvailableDrivers();
            if (!in_array('sqlsrv', $drivers)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi: Máy chủ thiếu Driver [sqlsrv]. Drivers hiện có: ' . implode(',', $drivers)
                ]);
            }

            // Bước 2: Thử tạo DSN (Kiểm tra cả Server và Database)
            $dsn = "sqlsrv:Server=$server;LoginTimeout=5;Encrypt=true;TrustServerCertificate=true";
            if ($database) {
                $dsn .= ";Database=$database";
            }
            
            // Bước 3: Thử kết nối thực tế
            $conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            $msg = $database ? "KẾT NỐI THÀNH CÔNG TỚI DATABASE [$database]!" : "KẾT NỐI SERVER THÀNH CÔNG (Chưa chọn DB)!";

            return response()->json([
                'success' => true,
                'message' => $msg
            ]);

        } catch (\Throwable $e) {
            // Bắt mọi loại lỗi kể cả Fatal Error
            return response()->json([
                'success' => false,
                'message' => 'Lỗi hệ thống: ' . $e->getMessage() . ' (File: ' . basename($e->getFile()) . ' L:' . $e->getLine() . ')'
            ]);
        }
    }

    /**
     * Save all settings to database
     */
    public function saveSettings(Request $request)
    {
        $configs = $request->all();
        
        try {
            DB::beginTransaction();
            
            foreach ($configs as $key => $value) {
                // Chỉ lưu các key hợp lệ, tránh CSRF token
                if ($key === '_token') continue;

                DB::table('settings')->updateOrInsert(
                    ['key' => $key],
                    [
                        'value' => is_array($value) ? json_encode($value) : $value,
                        'updated_at' => now()
                    ]
                );
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Đã lưu cấu hình thành công!']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
