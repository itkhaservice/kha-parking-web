@extends('layouts.admin')
@section('title', 'Báo cáo & Thống kê')
@section('content')
<div class="space-y-6">
    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="admin-card text-center border-l-4 border-green-500">
            <h4 class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-2">Doanh thu ngày</h4>
            <span class="text-3xl font-extrabold text-green-400 tracking-tighter">1.250.000<small class="text-xs font-normal text-gray-400"> VNĐ</small></span>
        </div>
        <div class="admin-card text-center border-l-4 border-blue-500">
            <h4 class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-2">Lượt xe Vào</h4>
            <span class="text-3xl font-extrabold text-blue-400">128<small class="text-xs font-normal text-gray-400"> lượt</small></span>
        </div>
        <div class="admin-card text-center border-l-4 border-orange-500">
            <h4 class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-2">Lượt xe Ra</h4>
            <span class="text-3xl font-extrabold text-orange-400">95<small class="text-xs font-normal text-gray-400"> lượt</small></span>
        </div>
        <div class="admin-card text-center border-l-4 border-purple-500">
            <h4 class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-2">Xe trong bãi</h4>
            <span class="text-3xl font-extrabold text-purple-400">33<small class="text-xs font-normal text-gray-400"> xe</small></span>
        </div>
    </div>

    <!-- Charts Placeholder -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 h-64">
        <div class="admin-card flex items-center justify-center">
            <p class="text-gray-600 italic">Biểu đồ doanh thu theo giờ...</p>
        </div>
        <div class="admin-card flex items-center justify-center">
            <p class="text-gray-600 italic">Tỉ lệ loại xe (Ô tô/Xe máy)...</p>
        </div>
    </div>
</div>
@endsection
