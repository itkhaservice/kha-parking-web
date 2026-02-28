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
     * Test connection to SQL Server with provided credentials
     */
    public function testDbConnection(Request $request)
    {
        $server = $request->input('server_name');
        $user = $request->input('db_user');
        $pass = $request->input('db_pass');
        $database = $request->input('db_name');

        // Kiểm tra Driver trước khi thử kết nối
        if (!in_array('sqlsrv', PDO::getAvailableDrivers())) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi: Máy chủ PHP chưa cài đặt Driver SQLSRV!'
            ], 500);
        }

        try {
            // Thêm LoginTimeout vào DSN để báo lỗi nhanh
            $dsn = "sqlsrv:Server=$server;Database=$database;LoginTimeout=5;Encrypt=false;TrustServerCertificate=true";
            
            $conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kết nối SQL Server thành công!'
            ]);
        } catch (Exception $e) {
            // Trả về thông báo lỗi ngắn gọn
            $errorMsg = $e->getMessage();
            if (str_contains($errorMsg, 'Login timeout expired')) {
                $errorMsg = 'Lỗi: Không tìm thấy Server (Timeout 5s)';
            }
            return response()->json([
                'success' => false,
                'message' => $errorMsg
            ], 200); // Trả về 200 để JS xử lý thông báo đẹp
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
