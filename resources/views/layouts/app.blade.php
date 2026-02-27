<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KHA-PARKING') - Hệ thống quản lý bãi xe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #108042;
            --secondary-color: #f4f6f9;
            --text-color: #333;
            --white: #ffffff;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--secondary-color);
            color: var(--text-color);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: var(--white);
            transition: all 0.3s;
            position: fixed;
            height: 100%;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            background-color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 10px 0;
        }

        .sidebar-menu li a {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            color: #bdc3c7;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            background-color: #34495e;
            color: var(--white);
            border-left: 4px solid var(--primary-color);
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            width: calc(100% - 250px);
        }

        header {
            background-color: var(--white);
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .content-body {
            padding: 20px;
        }

        /* Footer */
        footer {
            margin-top: auto;
            padding: 15px 20px;
            background-color: var(--white);
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .sidebar.active {
                width: 250px;
            }
        }

        /* Standard Components from gemini.md */
        .card {
            background: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            KHA-PARKING
        </div>
        <ul class="sidebar-menu">
            <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-exchange-alt"></i> Giám sát Ra/Vào</a></li>
            <li><a href="#"><i class="fas fa-id-card"></i> Quản lý Thẻ</a></li>
            <li><a href="#"><i class="fas fa-car"></i> Quản lý Xe</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Khách hàng</a></li>
            <li><a href="#"><i class="fas fa-file-invoice-dollar"></i> Báo cáo doanh thu</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Cấu hình hệ thống</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <div class="menu-toggle" id="menu-toggle" style="cursor: pointer;">
                <i class="fas fa-bars"></i>
            </div>
            <div class="user-info">
                <span>Chào, <strong>Admin</strong></span>
                <i class="fas fa-user-circle fa-lg"></i>
            </div>
        </header>

        <div class="content-body">
            @yield('content')
        </div>

        <footer>
            &copy; 2026 KHA-PARKING. Phát triển bởi IT Department.
        </footer>
    </div>

    <script>
        document.getElementById('menu-toggle').onclick = function() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
    @yield('scripts')
</body>
</html>
