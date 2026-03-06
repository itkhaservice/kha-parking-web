<?php

return [
    'brands' => [
        'hikvision' => [
            'snapshot_url' => '/ISAPI/Streaming/channels/{channel}01/picture',
            'rtsp_url' => 'rtsp://{user}:{pass}@{ip}:{port}/Streaming/Channels/{channel}01',
        ],
        'dahua' => [
            'snapshot_url' => '/cgi-bin/snapshot.cgi?channel={channel}',
            'rtsp_url' => 'rtsp://{user}:{pass}@{ip}:{port}/cam/realmonitor?channel={channel}&subtype=0',
        ],
        'kbvision' => [
            'snapshot_url' => '/cgi-bin/snapshot.cgi?channel={channel}',
            'rtsp_url' => 'rtsp://{user}:{pass}@{ip}:{port}/cam/realmonitor?channel={channel}&subtype=0',
        ],
    ],

    'lanes' => [
        'cam_in_plate' => [
            'name' => 'Camera Biển Số (Vào)',
            'brand' => env('CAM_IN_PLATE_BRAND', 'dahua'),
            'ip' => env('CAM_IN_PLATE_IP', '192.168.1.101'),
            'port' => env('CAM_IN_PLATE_PORT', 80),
            'username' => env('CAM_IN_PLATE_USER', 'admin'),
            'password' => env('CAM_IN_PLATE_PASS', 'admin123'),
            'channel' => 1,
        ],
        'cam_in_view' => [
            'name' => 'Camera Toàn Cảnh (Vào)',
            'brand' => env('CAM_IN_VIEW_BRAND', 'dahua'),
            'ip' => env('CAM_IN_VIEW_IP', '192.168.1.102'),
            'port' => env('CAM_IN_VIEW_PORT', 80),
            'username' => env('CAM_IN_VIEW_USER', 'admin'),
            'password' => env('CAM_IN_VIEW_PASS', 'admin123'),
            'channel' => 1,
        ],
        'cam_out_plate' => [
            'name' => 'Camera Biển Số (Ra)',
            'brand' => env('CAM_OUT_PLATE_BRAND', 'dahua'),
            'ip' => env('CAM_OUT_PLATE_IP', '192.168.1.103'),
            'port' => env('CAM_OUT_PLATE_PORT', 80),
            'username' => env('CAM_OUT_PLATE_USER', 'admin'),
            'password' => env('CAM_OUT_PLATE_PASS', 'admin123'),
            'channel' => 1,
        ],
        'cam_out_view' => [
            'name' => 'Camera Toàn Cảnh (Ra)',
            'brand' => env('CAM_OUT_VIEW_BRAND', 'dahua'),
            'ip' => env('CAM_OUT_VIEW_IP', '192.168.1.104'),
            'port' => env('CAM_OUT_VIEW_PORT', 80),
            'username' => env('CAM_OUT_VIEW_USER', 'admin'),
            'password' => env('CAM_OUT_VIEW_PASS', 'admin123'),
            'channel' => 1,
        ],
    ],
];
