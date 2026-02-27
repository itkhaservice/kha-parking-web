@extends('layouts.admin')
@section('title', 'Quản trị Người dùng')
@section('content')
<div class="admin-card">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold">Danh sách Nhân viên</h3>
        <button class="bg-green-600 px-6 py-2 rounded text-sm font-bold shadow hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i>Thêm Mới
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm border-collapse">
            <thead class="bg-gray-750 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="py-4 px-4 border-b border-gray-700">Mã NV</th>
                    <th class="py-4 px-4 border-b border-gray-700">Họ và Tên</th>
                    <th class="py-4 px-4 border-b border-gray-700">Tài khoản</th>
                    <th class="py-4 px-4 border-b border-gray-700">Vai trò</th>
                    <th class="py-4 px-4 border-b border-gray-700">Trạng thái</th>
                    <th class="py-4 px-4 border-b border-gray-700 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <tr>
                    <td class="py-4 px-4">#001</td>
                    <td class="py-4 px-4 font-bold">ITKHA</td>
                    <td class="py-4 px-4 text-green-400 font-mono">it@khaservice.vn</td>
                    <td class="py-4 px-4"><span class="bg-red-900 text-red-100 px-3 py-1 rounded text-xs uppercase font-bold">IT Admin</span></td>
                    <td class="py-4 px-4"><span class="text-green-500"><i class="fas fa-circle mr-2 text-[8px]"></i>Đang hoạt động</span></td>
                    <td class="py-4 px-4 text-right space-x-2">
                        <button class="text-blue-400 hover:text-white transition"><i class="fas fa-edit"></i></button>
                        <button class="text-red-400 hover:text-white transition"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="py-4 px-4">#002</td>
                    <td class="py-4 px-4 font-bold">Nguyễn Văn Bảo Vệ</td>
                    <td class="py-4 px-4 text-green-400 font-mono">guard01</td>
                    <td class="py-4 px-4"><span class="bg-blue-900 text-blue-100 px-3 py-1 rounded text-xs uppercase font-bold">Guard</span></td>
                    <td class="py-4 px-4"><span class="text-gray-500"><i class="fas fa-circle mr-2 text-[8px]"></i>Ngoại tuyến</span></td>
                    <td class="py-4 px-4 text-right space-x-2">
                        <button class="text-blue-400 hover:text-white transition"><i class="fas fa-edit"></i></button>
                        <button class="text-red-400 hover:text-white transition"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
