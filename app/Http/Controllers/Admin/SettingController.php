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

        try {
            // Thử kết nối bằng PDO SQLSRV hoặc DBLIB tùy hệ điều hành
            $dsn = "sqlsrv:Server=$server;Database=$database;Encrypt=false;TrustServerCertificate=true";
            
            // Nếu là Windows dùng SQLSRV, nếu Linux thường dùng DBLIB (nhưng ở đây đang chạy Windows)
            $conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 5 // Timeout 5 giây
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kết nối SQL Server thành công!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi kết nối: ' . $e->getMessage()
            ], 500);
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
