<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class CameraService
{
    public function getCameraConfig(string $lane)
    {
        $config = config("cameras.lanes.$lane");
        if (!$config) {
            throw new Exception("Camera configuration for lane [$lane] not found.");
        }
        return $config;
    }

    public function buildSnapshotUrl(string $lane)
    {
        $config = $this->getCameraConfig($lane);
        $brandConfig = config("cameras.brands.{$config['brand']}");

        $channel = $config['channel'] ?? 1;
        
        // Logic xử lý kênh đặc thù của Hikvision DVR (Kênh 1 -> 101, Kênh 2 -> 201...)
        if ($config['brand'] === 'hikvision') {
            $channel = ($channel * 100) + 1;
        }

        $path = str_replace(
            ['{channel}'],
            [$channel],
            $brandConfig['snapshot_url']
        );

        return "http://{$config['ip']}:{$config['port']}$path";
    }

    public function captureImage(string $lane)
    {
        $config = $this->getCameraConfig($lane);
        $url = $this->buildSnapshotUrl($lane);

        try {
            $response = Http::withBasicAuth($config['username'], $config['password'])
                ->timeout($config['timeout'] ?? 5)
                ->get($url);

            if ($response->successful()) {
                return $response->body();
            }

            Log::error("Camera Capture Failed for [$lane]: HTTP " . $response->status());
            return null;
        } catch (Exception $e) {
            Log::error("Camera Capture Error for [$lane]: " . $e->getMessage());
            return null;
        }
    }

    public function captureAndSave(string $lane)
    {
        $imageData = $this->captureImage($lane);
        if (!$imageData) return null;

        $dateStr = now()->format('Y-m-d');
        $filename = now()->format('Ymd_His') . "_{$lane}.jpg";
        $path = "parking/{$dateStr}/$filename";

        Storage::disk('local')->put($path, $imageData);

        return [
            'filename' => $filename,
            'path' => $path,
            'full_path' => storage_path("app/$path"),
            'url' => Storage::url($path)
        ];
    }

    public function checkCameraOnline(string $lane)
    {
        $config = $this->getCameraConfig($lane);
        $connection = @fsockopen($config['ip'], $config['port'], $errno, $errstr, 2);
        if (is_resource($connection)) {
            fclose($connection);
            return true;
        }
        return false;
    }

    public function getSafeConfig(string $lane)
    {
        $config = $this->getCameraConfig($lane);
        unset($config['password'], $config['username']);
        return $config;
    }
}
