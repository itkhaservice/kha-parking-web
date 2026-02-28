@extends('layouts.admin')
@section('title', 'Hệ thống Quản trị & Kế toán')

@section('content')
<style>
    :root {
        --primary-brand: #108042;
        --sidebar-width: 220px;
    }

    .management-wrapper {
        display: flex;
        height: calc(100vh - 100px);
        background: #F0F2F5;
        overflow: hidden;
    }

    /* Sidebar Styles */
    .mgmt-sidebar {
        width: var(--sidebar-width);
        background: #FFF;
        border-right: 1px solid #D1D5DB;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
    }

    .mgmt-nav-item {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #4B5563;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        border-bottom: 1px solid #F3F4F6;
        transition: all 0.2s;
    }

    .mgmt-nav-item:hover { background: #F9FAFB; color: var(--primary-brand); }
    .mgmt-nav-item.active {
        background: #EBF5FF;
        color: var(--primary-brand);
        border-right: 4px solid var(--primary-brand);
    }
    .mgmt-nav-item i { width: 16px; font-size: 14px; }

    /* Content Area */
    .mgmt-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
        background: #FFF;
    }

    /* Action Header */
    .mgmt-header {
        padding: 12px 20px;
        background: #F9FAFB;
        border-bottom: 1px solid #D1D5DB;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Filter Section */
    .filter-bar {
        padding: 10px 20px;
        background: #FFF;
        border-bottom: 1px solid #E5E7EB;
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }

    /* Table Styles */
    .table-container {
        flex: 1;
        overflow: auto;
        padding: 0;
    }

    .mgmt-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 12px;
    }

    .mgmt-table th {
        position: sticky;
        top: 0;
        background: #F3F4F6;
        padding: 10px 15px;
        text-align: left;
        font-weight: 900;
        color: #374151;
        border-bottom: 2px solid #D1D5DB;
        text-transform: uppercase;
        z-index: 10;
    }

    .mgmt-table td {
        padding: 8px 15px;
        border-bottom: 1px solid #F3F4F6;
        color: #1F2937;
        vertical-align: middle;
    }

    .mgmt-table tr:hover td { background: #F9FAFB; }
    
    .badge {
        padding: 2px 8px;
        border-radius: 99px;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
    }
    .badge-green { background: #DCFCE7; color: #166534; }
    .badge-blue { background: #DBEAFE; color: #1E40AF; }
    .badge-red { background: #FEE2E2; color: #991B1B; }

    /* Footer / Pagination */
    .mgmt-footer {
        padding: 8px 20px;
        background: #F9FAFB;
        border-top: 1px solid #D1D5DB;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 11px;
        font-weight: 700;
        color: #6B7280;
    }
</style>

<div class="management-wrapper">
    <!-- SIDEBAR -->
    <div class="mgmt-sidebar">
        <div class="p-4 bg-[#108042] text-white font-black text-xs uppercase tracking-widest text-center">
            Nghiệp vụ Kế toán
        </div>
        <div onclick="switchMgmtTab('cards')" id="tab-link-cards" class="mgmt-nav-item active">
            <i class="fas fa-id-card"></i> 1. Quản lý Thẻ tháng
        </div>
        <div onclick="switchMgmtTab('in-yard')" id="tab-link-in-yard" class="mgmt-nav-item">
            <i class="fas fa-parking"></i> 2. Xe đang trong bãi
        </div>
        <div onclick="switchMgmtTab('history')" id="tab-link-history" class="mgmt-nav-item">
            <i class="fas fa-history"></i> 3. Lịch sử vào ra
        </div>
        <div onclick="switchMgmtTab('revenue')" id="tab-link-revenue" class="mgmt-nav-item">
            <i class="fas fa-chart-line"></i> 4. Báo cáo doanh thu
        </div>
        <div onclick="switchMgmtTab('customers')" id="tab-link-customers" class="mgmt-nav-item">
            <i class="fas fa-users"></i> 5. Danh mục Khách hàng
        </div>
        <div onclick="switchMgmtTab('staff')" id="tab-link-staff" class="mgmt-nav-item">
            <i class="fas fa-user-shield"></i> 6. Nhân viên hệ thống
        </div>
        <div class="mt-auto p-4 border-t border-gray-100">
            <button class="w-full py-2 bg-gray-100 text-gray-600 rounded text-[10px] font-black uppercase hover:bg-gray-200">
                <i class="fas fa-file-export mr-1"></i> Xuất Excel báo cáo
            </button>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="mgmt-content">
        <!-- Tab: Quản lý thẻ tháng -->
        <div id="tab-cards" class="mgmt-tab-pane flex flex-col h-full">
            <div class="mgmt-header">
                <h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Danh sách Thẻ thành viên (Thẻ tháng)</h2>
                <div class="flex gap-2">
                    <button class="btn-action bg-white border-gray-300"><i class="fas fa-sync-alt"></i> Làm mới</button>
                    <button class="btn-action btn-blue font-bold shadow-sm"><i class="fas fa-plus"></i> Đăng ký thẻ mới</button>
                </div>
            </div>

            <div class="filter-bar">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black text-gray-400 uppercase">Tìm nhanh:</span>
                    <input type="text" placeholder="Biển số hoặc Số thẻ..." class="f-input !w-48 font-bold">
                </div>
                <select class="f-input !w-32">
                    <option>Tất cả loại xe</option>
                    <option>Xe máy</option>
                    <option>Xe hơi</option>
                </select>
                <select class="f-input !w-32">
                    <option>Tất cả trạng thái</option>
                    <option>Đang hoạt động</option>
                    <option>Hết hạn</option>
                    <option>Đã khóa</option>
                </select>
                <button class="btn-action btn-blue !h-6 px-4">LỌC</button>
                <button class="btn-action !h-6 text-red-600">Xóa lọc</button>
            </div>

            <div class="table-container">
                <table class="mgmt-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Thẻ (UID)</th>
                            <th>Biển số</th>
                            <th>Chủ xe</th>
                            <th>Loại xe</th>
                            <th>Ngày hết hạn</th>
                            <th>Số dư / Giá tiền</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-bold text-gray-400">01</td>
                            <td class="font-black text-blue-700">04928172</td>
                            <td class="font-black text-lg">51-G1 777.77</td>
                            <td class="font-bold uppercase">Nguyễn Văn A</td>
                            <td>Xe máy</td>
                            <td class="text-green-700 font-bold">30/12/2026</td>
                            <td class="font-bold">120,000</td>
                            <td><span class="badge badge-green">Hoạt động</span></td>
                            <td class="text-right">
                                <button class="text-blue-600 hover:underline mr-3 font-bold">Gia hạn</button>
                                <button class="text-gray-400 hover:text-blue-600"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold text-gray-400">02</td>
                            <td class="font-black text-blue-700">04928185</td>
                            <td class="font-black text-lg">64-H1 069.10</td>
                            <td class="font-bold uppercase">Lê Minh Tâm</td>
                            <td>Xe máy</td>
                            <td class="text-red-600 font-bold">20/02/2026</td>
                            <td class="font-bold">0</td>
                            <td><span class="badge badge-red">Hết hạn</span></td>
                            <td class="text-right">
                                <button class="text-blue-600 hover:underline mr-3 font-bold">Gia hạn</button>
                                <button class="text-gray-400 hover:text-blue-600"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mgmt-footer">
                <div>Hiển thị 1 - 20 trong tổng số 1,250 thẻ</div>
                <div class="flex gap-2">
                    <button class="btn-action !h-6 px-3"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn-action !h-6 px-3 bg-[#108042] text-white border-[#108042]">1</button>
                    <button class="btn-action !h-6 px-3">2</button>
                    <button class="btn-action !h-6 px-3">3</button>
                    <button class="btn-action !h-6 px-3"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <!-- Tab 2: Xe đang trong bãi -->
        <div id="tab-in-yard" class="mgmt-tab-pane flex flex-col h-full hidden">
            <div class="mgmt-header">
                <h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Danh sách Xe đang gửi trong bãi</h2>
                <div class="flex gap-2">
                    <div class="px-3 py-1 bg-blue-50 text-blue-700 font-bold text-xs rounded border border-blue-200">Tổng xe: 145</div>
                    <button class="btn-action bg-white border-gray-300"><i class="fas fa-sync-alt"></i> Làm mới</button>
                </div>
            </div>
            <div class="filter-bar">
                <input type="text" placeholder="Tìm biển số..." class="f-input !w-48 font-bold">
                <select class="f-input !w-32"><option>Tất cả khu vực</option><option>Tầng hầm 1</option><option>Tầng hầm 2</option></select>
                <button class="btn-action btn-blue !h-6 px-4">Tìm kiếm</button>
            </div>
            <div class="table-container">
                <table class="mgmt-table">
                    <thead><tr><th>STT</th><th>Biển số</th><th>Loại xe</th><th>Giờ vào</th><th>Cổng vào</th><th>Thời gian gửi</th><th>Hình ảnh</th></tr></thead>
                    <tbody>
                        <tr>
                            <td>01</td><td class="font-black text-lg">59-V1 123.45</td><td>Xe máy</td><td>08:30 28/02</td><td>Cổng chính</td><td class="font-bold text-orange-600">2h 15p</td>
                            <td><button class="text-blue-600 underline text-[10px] font-bold">Xem hình</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab 3: Lịch sử vào ra -->
        <div id="tab-history" class="mgmt-tab-pane flex flex-col h-full hidden">
            <div class="mgmt-header"><h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Tra cứu Lịch sử Vào / Ra</h2></div>
            <div class="filter-bar gap-2">
                <span class="text-[10px] font-bold">Từ ngày:</span><input type="date" class="f-input">
                <span class="text-[10px] font-bold">Đến ngày:</span><input type="date" class="f-input">
                <input type="text" placeholder="Biển số / Thẻ..." class="f-input font-bold">
                <button class="btn-action btn-blue !h-6 px-4">Tra cứu</button>
            </div>
            <div class="table-container">
                <div class="p-10 text-center text-gray-400 italic">Vui lòng chọn điều kiện lọc để xem dữ liệu...</div>
            </div>
        </div>

        <!-- Tab 4: Báo cáo doanh thu -->
        <div id="tab-revenue" class="mgmt-tab-pane flex flex-col h-full hidden">
            <div class="mgmt-header"><h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Báo cáo Doanh thu & Thống kê</h2></div>
            <div class="p-4 grid grid-cols-4 gap-4">
                <div class="bg-blue-50 p-4 rounded border border-blue-200">
                    <div class="text-xs text-blue-600 font-bold uppercase">Doanh thu hôm nay</div>
                    <div class="text-2xl font-black text-blue-800">1,250,000 đ</div>
                </div>
                <div class="bg-green-50 p-4 rounded border border-green-200">
                    <div class="text-xs text-green-600 font-bold uppercase">Lượt xe vào</div>
                    <div class="text-2xl font-black text-green-800">450</div>
                </div>
                <div class="bg-orange-50 p-4 rounded border border-orange-200">
                    <div class="text-xs text-orange-600 font-bold uppercase">Vé tháng gia hạn</div>
                    <div class="text-2xl font-black text-orange-800">5</div>
                </div>
            </div>
        </div>

        <!-- Tab 5: Khách hàng -->
        <div id="tab-customers" class="mgmt-tab-pane flex flex-col h-full hidden">
            <div class="mgmt-header"><h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Danh mục Khách hàng</h2></div>
            <div class="table-container p-4">
                <p class="text-gray-500 italic">Danh sách khách hàng đang được cập nhật...</p>
            </div>
        </div>

        <!-- Tab 6: Nhân viên -->
        <div id="tab-staff" class="mgmt-tab-pane flex flex-col h-full hidden">
            <div class="mgmt-header">
                <h2 class="text-sm font-black text-gray-700 uppercase tracking-tight">Quản lý Nhân viên</h2>
                <button class="btn-action btn-blue font-bold shadow-sm"><i class="fas fa-plus"></i> Thêm Nhân viên</button>
            </div>
            <div class="table-container">
                <table class="mgmt-table">
                    <thead><tr><th>Mã NV</th><th>Họ tên</th><th>Tài khoản</th><th>Vai trò</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>
                    <tbody>
                        <tr><td>NV001</td><td class="font-bold">Admin IT</td><td>admin</td><td>Quản trị</td><td><span class="badge badge-green">Active</span></td><td>...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    function switchMgmtTab(tabId) {
        // Remove active class from sidebar items
        document.querySelectorAll('.mgmt-nav-item').forEach(el => el.classList.remove('active'));
        
        // Hide all tab panes
        document.querySelectorAll('.mgmt-tab-pane').forEach(el => el.classList.add('hidden'));
        
        // Activate selected item
        document.getElementById('tab-link-' + tabId).classList.add('active');
        
        // Show selected content
        const targetPane = document.getElementById('tab-' + tabId);
        if (targetPane) {
            targetPane.classList.remove('hidden');
        }
    }
</script>
@endsection
