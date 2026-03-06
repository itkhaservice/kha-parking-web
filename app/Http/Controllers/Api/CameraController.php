<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CameraService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CameraController extends Controller
{
    protected $cameraService;

    public function __construct(CameraService $cameraService)
    {
        $this->cameraService = $cameraService;
    }

    /**
     * API Test Snapshot: Trả về trực tiếp file ảnh để hiển thị trên trình duyệt
     */
    public function testSnapshot(string $lane)
    {
        $imageData = $this->cameraService->captureImage($lane);

        if (!$imageData) {
            return response()->json(['error' => 'Could not capture image from camera'], 500);
        }

        return response($imageData)->header('Content-Type', 'image/jpeg');
    }

    /**
     * API Health Check
     */
    public function healthCheck(string $lane)
    {
        try {
            $isOnline = $this->cameraService->checkCameraOnline($lane);
            $config = $this->cameraService->getSafeConfig($lane);

            return response()->json([
                'lane' => $lane,
                'name' => $config['name'],
                'status' => $isOnline ? 'online' : 'offline',
                'ip' => $config['ip'],
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
