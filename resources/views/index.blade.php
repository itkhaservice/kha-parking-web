@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')
<style>
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background-color: var(--white);
        border-radius: 10px;
        padding: 25px;
        display: flex;
        align-items: center;
        box-shadow: var(--shadow);
        border-left: 5px solid var(--primary-color);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #e8f5e9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--primary-color);
        margin-right: 20px;
    }

    .stat-info h3 {
        font-size: 0.9rem;
        color: #7f8c8d;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .stat-info p {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--text-color);
    }

    .recent-transactions {
        background-color: var(--white);
        padding: 20px;
        border-radius: 10px;
        box-shadow: var(--shadow);
    }

    .recent-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #f8f9fa;
        text-align: left;
        padding: 12px;
        color: #7f8c8d;
        font-weight: 600;
        border-bottom: 2px solid #eee;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-in { background-color: #e3f2fd; color: #1976d2; }
    .status-completed { background-color: #e8f5e9; color: #2e7d32; }

    .btn-view {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-car-side"></i></div>
        <div class="stat-info">
            <h3>Xe trong bãi</h3>
            <p>125</p>
        </div>
    </div>
    <div class="stat-card" style="border-left-color: #3498db;">
        <div class="stat-icon" style="background-color: #ebf5fb; color: #3498db;"><i class="fas fa-sign-in-alt"></i></div>
        <div class="stat-info">
            <h3>Lượt vào hôm nay</h3>
            <p>450</p>
        </div>
    </div>
    <div class="stat-card" style="border-left-color: #e67e22;">
        <div class="stat-icon" style="background-color: #fef5e7; color: #e67e22;"><i class="fas fa-sign-out-alt"></i></div>
        <div class="stat-info">
            <h3>Lượt ra hôm nay</h3>
            <p>385</p>
        </div>
    </div>
    <div class="stat-card" style="border-left-color: #f1c40f;">
        <div class="stat-icon" style="background-color: #fef9e7; color: #f1c40f;"><i class="fas fa-money-bill-wave"></i></div>
        <div class="stat-info">
            <h3>Doanh thu ngày</h3>
            <p>2,450,000đ</p>
        </div>
    </div>
</div>

<div class="recent-transactions">
    <div class="recent-header">
        <h2 style="font-size: 1.2rem; color: #2c3e50;">Giao dịch gần đây</h2>
        <a href="#" class="btn-view">Xem tất cả <i class="fas fa-arrow-right"></i></a>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Biển số</th>
                    <th>Loại xe</th>
                    <th>Giờ vào</th>
                    <th>Giờ ra</th>
                    <th>Trạng thái</th>
                    <th>Phí gửi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>51G-123.45</strong></td>
                    <td>Ô tô</td>
                    <td>10:15 27/02/2026</td>
                    <td>--</td>
                    <td><span class="status-badge status-in">Trong bãi</span></td>
                    <td>--</td>
                </tr>
                <tr>
                    <td><strong>59D1-999.99</strong></td>
                    <td>Xe máy</td>
                    <td>08:30 27/02/2026</td>
                    <td>11:45 27/02/2026</td>
                    <td><span class="status-badge status-completed">Hoàn tất</span></td>
                    <td>5,000đ</td>
                </tr>
                <tr>
                    <td><strong>60A-456.78</strong></td>
                    <td>Ô tô</td>
                    <td>07:45 27/02/2026</td>
                    <td>11:30 27/02/2026</td>
                    <td><span class="status-badge status-completed">Hoàn tất</span></td>
                    <td>30,000đ</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
