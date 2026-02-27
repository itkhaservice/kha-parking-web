<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kha-Parking Admin | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-link { @apply flex items-center space-x-3 p-3 rounded-lg transition-all; }
        .sidebar-link:hover { @apply bg-gray-700 text-green-400; }
        .sidebar-link.active { @apply bg-green-700 text-white shadow-lg; }
        .admin-card { @apply bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-xl; }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 font-sans flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-xl font-bold text-green-500 uppercase tracking-tighter">
                <i class="fas fa-user-shield mr-2"></i>Admin Panel
            </h1>
        </div>
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.management') }}" class="sidebar-link {{ request()->routeIs('admin.management') ? 'active' : '' }}">
                <i class="fas fa-users-cog w-5"></i><span>Quản trị</span>
            </a>
            <a href="{{ route('admin.history') }}" class="sidebar-link {{ request()->routeIs('admin.history') ? 'active' : '' }}">
                <i class="fas fa-history w-5"></i><span>Lịch sử</span>
            </a>
            <a href="{{ route('admin.statistics') }}" class="sidebar-link {{ request()->routeIs('admin.statistics') ? 'active' : '' }}">
                <i class="fas fa-chart-pie w-5"></i><span>Thống kê</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-sliders-h w-5"></i><span>Cài đặt</span>
            </a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <a href="/" class="flex items-center space-x-3 p-3 text-gray-400 hover:text-white transition">
                <i class="fas fa-sign-out-alt w-5"></i><span>Thoát Admin</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col overflow-hidden">
        <header class="h-16 bg-gray-800 border-b border-gray-700 flex items-center justify-between px-8">
            <h2 class="text-lg font-semibold">@yield('title')</h2>
            <div class="flex items-center space-x-4">
                <span class="text-xs text-gray-400">Chào, <strong class="text-green-400">ITKHA</strong></span>
                <div class="w-8 h-8 bg-green-700 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-xs"></i>
                </div>
            </div>
        </header>
        <div class="flex-grow p-8 overflow-y-auto">
            @yield('content')
        </div>
    </main>

</body>
</html>
