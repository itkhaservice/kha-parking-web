@extends('layouts.admin')
@section('title', 'Cài đặt Hệ thống')
@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Camera Config -->
        <div class="admin-card">
            <h3 class="text-lg font-bold mb-4 flex items-center text-green-500">
                <i class="fas fa-video mr-3"></i>Cấu hình Camera (RTSP)
            </h3>
            <div class="space-y-4">
                <div class="grid grid-cols-12 gap-2">
                    <label class="col-span-3 text-xs text-gray-400 mt-2">Làn 1 Vào</label>
                    <input type="text" value="rtsp://admin:pass@192.168.1.100:554/stream1" class="col-span-9 bg-gray-900 border border-gray-600 rounded p-2 text-xs font-mono">
                </div>
                <div class="grid grid-cols-12 gap-2 border-t border-gray-700 pt-3">
                    <label class="col-span-3 text-xs text-gray-400 mt-2">Làn 2 Ra</label>
                    <input type="text" value="rtsp://admin:pass@192.168.1.101:554/stream1" class="col-span-9 bg-gray-900 border border-gray-600 rounded p-2 text-xs font-mono">
                </div>
                <div class="flex justify-end pt-4">
                    <button class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded font-bold text-xs transition">Lưu Cài đặt Camera</button>
                </div>
            </div>
        </div>

        <!-- System Param -->
        <div class="admin-card">
            <h3 class="text-lg font-bold mb-4 flex items-center text-blue-500">
                <i class="fas fa-tools mr-3"></i>Tham số Vận hành
            </h3>
            <div class="space-y-4">
                <div class="flex justify-between border-b border-gray-700 pb-3">
                    <label class="text-xs text-gray-400">Thời gian miễn phí (phút)</label>
                    <input type="number" value="15" class="bg-gray-900 border border-gray-600 rounded p-1 w-20 text-center">
                </div>
                <div class="flex justify-between border-b border-gray-700 pb-3">
                    <label class="text-xs text-gray-400">Tự động mở Barie</label>
                    <input type="checkbox" checked class="w-5 h-5 accent-green-500">
                </div>
                <div class="flex justify-between border-b border-gray-700 pb-3">
                    <label class="text-xs text-gray-400">Chế độ Lưu trữ Ảnh</label>
                    <select class="bg-gray-900 border border-gray-600 rounded p-1 text-xs px-4">
                        <option>30 Ngày</option>
                        <option>60 Ngày</option>
                        <option>Vô hạn</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
