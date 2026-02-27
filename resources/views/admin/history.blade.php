@extends('layouts.admin')
@section('title', 'Tra cứu Lịch sử')
@section('content')
<div class="space-y-6">
    <div class="admin-card">
        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-4 tracking-widest">Bộ lọc Tìm kiếm</h3>
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="flex flex-col space-y-1">
                <label class="text-xs text-gray-400">Từ ngày</label>
                <input type="date" class="bg-gray-900 border border-gray-600 rounded p-2 focus:outline-none focus:border-green-500 text-sm">
            </div>
            <div class="flex flex-col space-y-1">
                <label class="text-xs text-gray-400">Đến ngày</label>
                <input type="date" class="bg-gray-900 border border-gray-600 rounded p-2 focus:outline-none focus:border-green-500 text-sm">
            </div>
            <div class="flex flex-col space-y-1">
                <label class="text-xs text-gray-400">Biển số/Mã thẻ</label>
                <input type="text" placeholder="Tìm kiếm..." class="bg-gray-900 border border-gray-600 rounded p-2 focus:outline-none focus:border-green-500 text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded font-bold shadow transition uppercase text-xs">
                    <i class="fas fa-search mr-2"></i>Tìm kiếm
                </button>
            </div>
        </form>
    </div>

    <div class="admin-card">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold">Lịch sử Giao dịch</h3>
            <button class="text-green-400 hover:text-white transition text-sm">
                <i class="fas fa-file-excel mr-2"></i>Xuất Excel
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead class="bg-gray-750 text-gray-500 uppercase border-b border-gray-700">
                    <tr>
                        <th class="py-3 px-4">Thời gian</th>
                        <th class="py-3 px-4">Thẻ</th>
                        <th class="py-3 px-4">Biển số</th>
                        <th class="py-3 px-4">Loại xe</th>
                        <th class="py-3 px-4">Số tiền</th>
                        <th class="py-3 px-4">Nhân viên</th>
                        <th class="py-3 px-4">Ảnh</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <tr>
                        <td class="py-3 px-4">
                            <span class="block">27/02/2026</span>
                            <span class="text-gray-500 text-[10px]">19:15:30</span>
                        </td>
                        <td class="py-3 px-4 font-mono">0012345678</td>
                        <td class="py-3 px-4 font-bold text-green-400">51F-123.45</td>
                        <td class="py-3 px-4 text-gray-300">Xe Máy</td>
                        <td class="py-3 px-4 text-yellow-400 font-bold">5.000đ</td>
                        <td class="py-3 px-4">Guard01</td>
                        <td class="py-3 px-4">
                            <button class="text-blue-500 hover:underline"><i class="fas fa-image mr-1"></i>Xem</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4">
                            <span class="block">27/02/2026</span>
                            <span class="text-gray-500 text-[10px]">19:10:12</span>
                        </td>
                        <td class="py-3 px-4 font-mono">0099887766</td>
                        <td class="py-3 px-4 font-bold">59L-999.88</td>
                        <td class="py-3 px-4 text-gray-300">Ô tô</td>
                        <td class="py-3 px-4 text-yellow-400 font-bold">50.000đ</td>
                        <td class="py-3 px-4">Guard01</td>
                        <td class="py-3 px-4">
                            <button class="text-blue-500 hover:underline"><i class="fas fa-image mr-1"></i>Xem</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
