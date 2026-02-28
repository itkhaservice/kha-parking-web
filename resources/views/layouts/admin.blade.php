<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHA-PARKING Admin | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-brand: #108042;
            --bg-light: #F0F2F5;
            --panel-white: #FFFFFF;
            --border-color: #D1D5DB;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
        }
        body { background-color: var(--bg-light); color: var(--text-dark); font-family: 'Segoe UI', Tahoma, sans-serif; margin: 0; padding: 0; height: 100vh; display: flex; flex-direction: column; overflow: hidden; }

        /* HEADER - SYNCED WITH DASHBOARD */
        header.main-header {
            height: 7vh;
            min-height: 50px;
            background: linear-gradient(to bottom, #FFFFFF, #F9FAFB);
            border-bottom: 3px solid var(--primary-brand);
            display: grid;
            grid-template-columns: 1.2fr 0.8fr 1fr;
            align-items: center;
            padding: 0 15px;
            z-index: 100;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .text-clock { font-size: clamp(16px, 1.4vw, 24px); font-weight: 700; font-family: 'Courier New', monospace; color: var(--primary-brand); }
        .text-label { font-size: clamp(8px, 0.55vw, 10px); text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); font-weight: 800; }
        .text-value { font-size: clamp(11px, 0.85vw, 15px); font-weight: 700; color: var(--text-dark); }

        .stat-group {
            background: #F3F4F6;
            border: 1px solid var(--border-color);
            padding: 4px 15px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .stat-item { display: flex; align-items: center; gap: 8px; }
        .stat-divider { width: 1px; height: 12px; background: var(--border-color); }

        /* Navigation Buttons */
        .nav-link { @apply text-[10px] font-bold text-gray-500 hover:text-[#108042] hover:underline transition flex items-center gap-1 uppercase; }
        .nav-link.active { @apply text-[#108042] underline; }

        /* Content Area */
        main.admin-body { flex: 1; overflow: hidden; display: flex; flex-direction: column; }
    </style>
    </head>
    <body>

    <header class="main-header">
        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-[#108042] rounded flex items-center justify-center font-bold text-white text-sm shadow-sm">KP</div>
                <h1 class="text-base font-black tracking-widest text-[#108042]">KHA-PARKING</h1>
            </div>
            <div class="h-4 w-[1px] bg-gray-300"></div>
        </div>

        <div class="text-center">
            <div id="global-clock" class="text-clock">10:15:20 - 28/02/2026</div>
        </div>

        <div class="flex justify-end items-center gap-3">
            <div class="stat-group">
                <div class="stat-item"><span class="text-label">Doanh thu:</span><span class="text-value text-orange-600">1,250,000</span></div>
                <div class="stat-divider"></div>
                <div class="stat-item"><span class="text-label">Trong bãi:</span><span class="text-value text-green-600">142</span></div>
                <div class="stat-divider"></div>
                <div class="stat-item"><span class="text-label">Ngoài bãi:</span><span class="text-value text-blue-600">85</span></div>
            </div>
            <button onclick="toggleFullScreen()" class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded shadow-sm hover:text-[#108042] hover:border-[#108042] transition-all text-gray-500" title="Toàn màn hình">
                <i class="fas fa-expand-arrows-alt"></i>
            </button>
        </div>
    </header>

    <main class="admin-body">
        @yield('content')
    </main>

    <script>
        function toggleFullScreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }
        function updateGlobalClock() {
            const now = new Date();
            const d = String(now.getDate()).padStart(2, '0');
            const m = String(now.getMonth() + 1).padStart(2, '0');
            const y = now.getFullYear();
            const h = String(now.getHours()).padStart(2, '0');
            const min = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            const clockEl = document.getElementById('global-clock');
            if (clockEl) clockEl.innerText = h + ":" + min + ":" + s + " - " + d + "/" + m + "/" + y;
        }
        setInterval(updateGlobalClock, 1000);
        updateGlobalClock();
    </script>
</body>
</html>
