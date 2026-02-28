<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHA-PARKING | Bảng Điều Khiển Giám Sát</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #0B3D91;
            --bg-light: #F0F2F5;
            --panel-white: #FFFFFF;
            --border-light: #D1D5DB;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
            --accent-green: #059669;
            --accent-red: #DC2626;
            --accent-blue: #2563EB;
            --accent-orange: #EA580C;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Utility: Scaling Fonts */
        .text-plate { font-size: clamp(14px, 1.4vw, 28px); font-weight: 900; font-family: 'Courier New', monospace; line-height: 1; }
        .text-clock { font-size: clamp(16px, 1.4vw, 24px); font-weight: 700; font-family: 'Courier New', monospace; }
        .text-label { font-size: clamp(8px, 0.55vw, 10px); text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); font-weight: 800; }
        .text-value { font-size: clamp(11px, 0.85vw, 15px); font-weight: 700; color: var(--text-dark); }

        /* Header Layout */
        header {
            height: 7vh;
            min-height: 50px;
            background: linear-gradient(to bottom, #FFFFFF, #F9FAFB);
            border-bottom: 3px solid var(--primary-blue);
            display: grid;
            grid-template-columns: 1.2fr 0.8fr 1fr;
            align-items: center;
            padding: 0 15px;
            z-index: 100;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .stat-group {
            background: #F3F4F6;
            border: 1px solid var(--border-light);
            padding: 4px 15px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .stat-item { display: flex; align-items: center; gap: 8px; }
        .stat-divider { width: 1px; height: 12px; background: var(--border-light); }

        /* Main Body */
        .dashboard-body {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px;
            padding: 6px;
            overflow: hidden;
        }

        .lane-container {
            display: flex;
            flex-direction: column;
            gap: 6px;
            height: 100%;
            overflow: hidden;
        }

        .media-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px;
            flex: 1; 
            min-height: 0;
        }

        .camera-placeholder {
            background-color: #E5E7EB;
            border: 1px solid var(--border-light);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            overflow: hidden;
        }

        .cam-tag {
            position: absolute;
            top: 5px;
            left: 5px;
            background: rgba(255,255,255,0.9);
            color: var(--primary-blue);
            font-size: 8px;
            font-weight: 900;
            padding: 2px 8px;
            border-left: 3px solid var(--primary-blue);
            z-index: 10;
            border-radius: 2px;
        }

        /* Info Area */
        .lane-info-grid {
            display: grid;
            grid-template-columns: 45% 55%;
            gap: 6px;
            height: 18vh;
            min-height: 160px;
            flex-shrink: 0;
        }

        .ai-column {
            background: var(--panel-white);
            border: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 4px;
            overflow: hidden;
        }

        .ai-upper-part {
            flex: 1;
            padding: 6px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 0;
        }

        .ai-lower-part {
            height: 50px; 
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between; /* Horizontal layout */
            align-items: center;
            background: #F9FAFB;
            padding: 0 12px;
            flex-shrink: 0;
        }

        .data-column {
            display: flex;
            flex-direction: column;
            gap: 6px;
            height: 100%;
        }

        .info-table {
            flex: 1;
            background: var(--panel-white);
            border: 1px solid var(--border-light);
            display: grid;
            grid-template-rows: repeat(4, 1fr);
            padding: 2px 15px;
            border-radius: 4px;
            min-height: 0;
        }

        .fee-panel {
            height: 50px;
            background: var(--panel-white);
            border: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            border-radius: 4px;
            flex-shrink: 0;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #F3F4F6;
            gap: 15px;
            min-height: 0;
        }
        .info-row:last-child { border: none; }

        .plate-img-frame {
            height: 100%;
            width: 100%;
            background: #F3F4F6;
            border: 1px dashed var(--border-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            color: #9CA3AF;
            font-weight: bold;
            border-radius: 2px;
        }

        /* Status Bar */
        .status-bar {
            height: 4.5vh;
            min-height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: clamp(13px, 1.1vw, 18px);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            flex-shrink: 0;
        }

        .bg-waiting { background-color: #DBEAFE; color: #1E40AF; border: 1px solid #BFDBFE; }
        .bg-success { background-color: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0; }
        .bg-error { background-color: #FEE2E2; color: #991B1B; border: 1px solid #FECACA; }
    </style>
</head>
<body>

    <header>
        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-900 rounded flex items-center justify-center font-bold text-white text-sm shadow-sm">KP</div>
                <h1 class="text-base font-black tracking-widest text-blue-900">KHA-PARKING</h1>
            </div>
            <div class="h-4 w-[1px] bg-gray-300"></div>
            <div class="flex items-center space-x-4">
                <button class="text-[10px] font-bold text-gray-500 hover:text-blue-700 hover:underline transition flex items-center gap-1"><i class="fas fa-sign-in-alt"></i> ĐĂNG NHẬP</button>
                <button class="text-[10px] font-bold text-gray-500 hover:text-blue-700 hover:underline transition flex items-center gap-1"><i class="fas fa-cog"></i> CÀI ĐẶT</button>
                <button class="text-[10px] font-bold text-gray-500 hover:text-blue-700 hover:underline transition flex items-center gap-1"><i class="fas fa-user-shield"></i> QUẢN TRỊ</button>
            </div>
        </div>
        <div class="text-center"><div id="clock" class="text-clock text-blue-700">10:15:20 - 28/02/2026</div></div>
        <div class="flex justify-end">
            <div class="stat-group">
                <div class="stat-item"><span class="text-label">Doanh thu:</span><span class="text-value text-orange-600">1,250,000</span></div>
                <div class="stat-divider"></div>
                <div class="stat-item"><span class="text-label">Trong bãi:</span><span class="text-value text-green-600">142</span></div>
                <div class="stat-divider"></div>
                <div class="stat-item"><span class="text-label">Ngoài bãi:</span><span class="text-value text-blue-600">85</span></div>
            </div>
        </div>
    </header>

    <div class="dashboard-body">
        
        <!-- LEFT LANE -->
        <div class="lane-container">
            <div class="media-section">
                <div class="camera-placeholder"><span class="cam-tag">TRỰC TIẾP BIỂN SỐ — CAM 05</span><i class="fas fa-video-slash opacity-20 text-4xl"></i></div>
                <div class="camera-placeholder"><span class="cam-tag">TRỰC TIẾP TOÀN CẢNH — CAM 06</span><i class="fas fa-video-slash opacity-20 text-4xl"></i></div>
            </div>

            <div class="lane-info-grid">
                <div class="ai-column">
                    <div class="ai-upper-part">
                        <div class="flex gap-1 h-full w-full">
                            <div class="plate-img-frame">ẢNH VÀO</div>
                            <div class="plate-img-frame">ẢNH RA</div>
                        </div>
                    </div>
                    <div class="ai-lower-part">
                        <div class="text-label">NHẬN DIỆN AI:</div>
                        <div class="flex items-center space-x-2">
                            <span class="text-plate text-blue-600">51-G1-77777</span>
                            <span class="text-red-600 font-black text-xs">≠</span>
                            <span class="text-plate text-red-600">51-G1-88888</span>
                        </div>
                        <div class="text-[8px] font-black text-red-800 bg-red-100 px-1 rounded uppercase">Sai biển số</div>
                    </div>
                </div>
                <div class="data-column">
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-item"><span class="text-label">Số thẻ:</span> <span class="text-value">UID-40291</span></div>
                            <div class="info-item"><span class="text-label">Loại:</span> <span class="text-value text-blue-600">Xe Tháng</span></div>
                            <div class="info-item"><span class="text-label">TG Gửi:</span> <span class="text-value">---</span></div>
                        </div>
                        <div class="info-row">
                            <div class="info-item flex-1 truncate"><span class="text-label">Chủ xe:</span> <span class="text-value">NGUYỄN TRƯƠNG HOÀNG MINH TÂM</span></div>
                            <div class="info-item"><span class="text-label">Biển số ĐK:</span> <span class="text-value text-orange-600">51-G1-77777</span></div>
                        </div>
                        <div class="info-row"><div class="info-item"><span class="text-label">Thời hạn:</span> <span class="text-value">01/03/2025 - 01/03/2030</span></div></div>
                        <div class="info-row">
                            <div class="info-item"><span class="text-label">Vào:</span> <span class="text-value">10:15:20 - 27/02/2026</span></div>
                            <div class="info-item"><span class="text-label">Ra:</span> <span class="text-value text-blue-600">10:15:20 - 28/02/2026</span></div>
                        </div>
                    </div>
                    <div class="fee-panel">
                        <div class="text-label">THANH TOÁN (PHÍ LƯỢT):</div>
                        <div class="flex items-baseline space-x-2"><div class="text-2xl font-black text-orange-600">25,000</div><div class="text-[9px] text-gray-500 font-bold">VNĐ</div></div>
                    </div>
                </div>
            </div>

            <div class="media-section">
                <div class="camera-placeholder"><span class="cam-tag">ẢNH CHỤP BIỂN SỐ</span><i class="fas fa-camera opacity-10 text-4xl"></i></div>
                <div class="camera-placeholder"><span class="cam-tag">ẢNH CHỤP TOÀN CẢNH</span><i class="fas fa-camera opacity-10 text-4xl"></i></div>
            </div>
            <div class="status-bar bg-error"><i class="fas fa-exclamation-triangle mr-3"></i> SAI BIỂN SỐ - CẢNH BÁO</div>
        </div>

        <!-- RIGHT LANE -->
        <div class="lane-container">
            <div class="media-section">
                <div class="camera-placeholder"><span class="cam-tag">TRỰC TIẾP BIỂN SỐ — CAM 01</span><i class="fas fa-video-slash opacity-20 text-4xl"></i></div>
                <div class="camera-placeholder"><span class="cam-tag">TRỰC TIẾP TOÀN CẢNH — CAM 02</span><i class="fas fa-video-slash opacity-20 text-4xl"></i></div>
            </div>

            <div class="lane-info-grid">
                <div class="ai-column">
                    <div class="ai-upper-part">
                        <div class="flex gap-1 h-full w-full">
                            <div class="plate-img-frame">ẢNH VÀO</div>
                            <div class="plate-img-frame opacity-30">ẢNH RA</div>
                        </div>
                    </div>
                    <div class="ai-lower-part">
                        <div class="text-label">NHẬN DIỆN AI:</div>
                        <div class="flex items-center space-x-2">
                            <span class="text-plate text-blue-600">64-H1-06910</span>
                            <span class="text-green-600 font-black text-xs">✓</span>
                            <span class="text-plate text-green-600">64-H1-06910</span>
                        </div>
                        <div class="text-[8px] font-black text-green-800 bg-green-100 px-1 rounded uppercase">Hợp lệ</div>
                    </div>
                </div>
                <div class="data-column">
                    <div class="info-table">
                        <div class="info-row">
                            <div class="info-item"><span class="text-label">Số thẻ:</span> <span class="text-value">UID-30291</span></div>
                            <div class="info-item"><span class="text-label">Loại:</span> <span class="text-value text-blue-600">Xe Tháng</span></div>
                            <div class="info-item"><span class="text-label">TG Gửi:</span> <span class="text-value">---</span></div>
                        </div>
                        <div class="info-row">
                            <div class="info-item flex-1 truncate"><span class="text-label">Chủ xe:</span> <span class="text-value">LÊ MINH TÂM</span></div>
                            <div class="info-item"><span class="text-label">Biển số ĐK:</span> <span class="text-value text-orange-600">64-H1-06910</span></div>
                        </div>
                        <div class="info-row"><div class="info-item"><span class="text-label">Thời hạn:</span> <span class="text-value">01/03/2025 - 01/03/2030</span></div></div>
                        <div class="info-row">
                            <div class="info-item"><span class="text-label">Vào:</span> <span class="text-value text-green-600">10:15:20 - 27/02/2026</span></div>
                            <div class="info-item"><span class="text-label">Ra:</span> <span class="text-value">---</span></div>
                        </div>
                    </div>
                    <div class="fee-panel">
                        <div class="text-label">THANH TOÁN (PHÍ LƯỢT):</div>
                        <div class="flex items-baseline space-x-2"><div class="text-2xl font-black text-gray-400">---</div><div class="text-[9px] text-gray-500 font-bold">VNĐ</div></div>
                    </div>
                </div>
            </div>

            <div class="media-section">
                <div class="camera-placeholder"><span class="cam-tag">ẢNH CHỤP BIỂN SỐ</span><i class="fas fa-camera opacity-10 text-4xl"></i></div>
                <div class="camera-placeholder"><span class="cam-tag">ẢNH CHỤP TOÀN CẢNH</span><i class="fas fa-camera opacity-10 text-4xl"></i></div>
            </div>
            <div class="status-bar bg-success"><i class="fas fa-check-circle mr-3"></i> MỜI XE VÀO BÃI</div>
        </div>

    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const d = String(now.getDate()).padStart(2, '0');
            const m = String(now.getMonth() + 1).padStart(2, '0');
            const y = now.getFullYear();
            const h = String(now.getHours()).padStart(2, '0');
            const min = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').innerText = h + ":" + min + ":" + s + " - " + d + "/" + m + "/" + y;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
