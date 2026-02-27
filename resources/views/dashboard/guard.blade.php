<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kha-Parking | Giám sát Làn xe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .camera-box { background: #1a202c; border: 2px solid #2d3748; position: relative; overflow: hidden; }
        .camera-label { position: absolute; top: 10px; left: 10px; background: rgba(0,0,0,0.7); color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .plate-box { background: #2d3748; color: #48bb78; font-family: 'Courier New', Courier, monospace; font-weight: bold; font-size: 24px; text-align: center; }
        .btn-action { background: #108042; transition: all 0.3s; }
        .btn-action:hover { background: #0c6333; transform: scale(1.05); }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 font-sans leading-normal tracking-normal h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-gray-800 border-b border-gray-700 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <h1 class="text-xl font-bold text-green-500 uppercase tracking-wider">
                <i class="fas fa-parking mr-2"></i>Kha-Parking System
            </h1>
            <span class="bg-gray-700 px-3 py-1 rounded text-xs text-gray-400">Trạng thái: Sẵn sàng</span>
        </div>
        <div class="flex space-x-2">
            <button onclick="checkAdmin('settings')" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded text-sm transition" title="Cấu hình">
                <i class="fas fa-cog"></i>
            </button>
            <button onclick="checkAdmin('history')" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded text-sm transition" title="Lịch sử">
                <i class="fas fa-history"></i>
            </button>
            <button onclick="checkAdmin('statistics')" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded text-sm transition" title="Thống kê">
                <i class="fas fa-chart-line"></i>
            </button>
            <button onclick="checkAdmin('management')" class="btn-action text-white px-6 py-2 rounded text-sm font-semibold shadow-lg">
                <i class="fas fa-user-shield mr-2"></i>Quản trị
            </button>
        </div>
    </header>

    <!-- Admin Login Modal -->
    <div id="adminModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
        <div class="bg-gray-800 p-8 rounded-lg border border-gray-700 shadow-2xl w-96">
            <h2 class="text-xl font-bold mb-4 text-green-500 text-center uppercase tracking-widest">Xác nhận IT Admin</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs text-gray-500 uppercase mb-1">Tên tài khoản</label>
                    <input type="text" id="adminUser" class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:outline-none focus:border-green-500 text-center text-white font-bold">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 uppercase mb-1">Mật khẩu truy cập</label>
                    <div class="relative">
                        <input type="password" id="adminPass" class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:outline-none focus:border-green-500 text-center text-white font-bold pr-10">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-2 text-gray-500 hover:text-white transition focus:outline-none">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>
                <div id="authError" class="hidden text-red-500 text-xs text-center py-1 font-bold">Sai thông tin đăng nhập!</div>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <button onclick="closeModal()" class="bg-gray-700 py-2 rounded hover:bg-gray-600 text-white">Hủy</button>
                    <button onclick="verifyLogin()" class="bg-green-600 py-2 rounded hover:bg-green-700 font-bold text-white">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for Admin Access -->
    <script>
        let targetRoute = '';
        
        function checkAdmin(feature) {
            targetRoute = feature;
            document.getElementById('adminModal').classList.remove('hidden');
            document.getElementById('adminUser').focus();
        }

        function closeModal() {
            document.getElementById('adminModal').classList.add('hidden');
            document.getElementById('adminUser').value = '';
            document.getElementById('adminPass').value = '';
            document.getElementById('adminPass').type = 'password';
            document.getElementById('eyeIcon').classList.remove('fa-eye-slash');
            document.getElementById('eyeIcon').classList.add('fa-eye');
            document.getElementById('authError').classList.add('hidden');
        }

        function togglePassword() {
            const passInput = document.getElementById('adminPass');
            const icon = document.getElementById('eyeIcon');
            
            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function verifyLogin() {
            const user = document.getElementById('adminUser').value;
            const pass = document.getElementById('adminPass').value;
            
            // Tài khoản mặc định cho IT
            if (user === 'ITKHA' && pass === '0310341786') {
                window.location.href = `/admin/${targetRoute}`;
            } else {
                document.getElementById('authError').classList.remove('hidden');
                document.getElementById('adminPass').value = '';
            }
        }
    </script>

    <!-- Main Content -->
    <main class="flex-grow p-4 grid grid-cols-12 gap-4 overflow-hidden">
        
        <!-- Left: Camera Views (2 Làn x 2 Camera) -->
        <div class="col-span-12 lg:col-span-8 grid grid-cols-2 grid-rows-2 gap-3 h-full">
            <div class="camera-box flex items-center justify-center rounded-lg shadow-inner group">
                <span class="camera-label">Làn 1 - BIỂN SỐ (VÀO)</span>
                <i class="fas fa-video text-gray-700 text-6xl opacity-20 group-hover:opacity-40 transition"></i>
                <div class="absolute bottom-4 left-4 right-4 plate-box py-2 rounded border border-gray-600 shadow-xl">
                    51F-123.45
                </div>
            </div>
            <div class="camera-box flex items-center justify-center rounded-lg shadow-inner group">
                <span class="camera-label">Làn 1 - TOÀN CẢNH (VÀO)</span>
                <i class="fas fa-video text-gray-700 text-6xl opacity-20 group-hover:opacity-40 transition"></i>
            </div>
            <div class="camera-box flex items-center justify-center rounded-lg shadow-inner group">
                <span class="camera-label">Làn 2 - BIỂN SỐ (RA)</span>
                <i class="fas fa-video text-gray-700 text-6xl opacity-20 group-hover:opacity-40 transition"></i>
                <div class="absolute bottom-4 left-4 right-4 plate-box py-2 rounded border border-gray-600 shadow-xl text-yellow-500">
                    -- WAITING --
                </div>
            </div>
            <div class="camera-box flex items-center justify-center rounded-lg shadow-inner group">
                <span class="camera-label">Làn 2 - TOÀN CẢNH (RA)</span>
                <i class="fas fa-video text-gray-700 text-6xl opacity-20 group-hover:opacity-40 transition"></i>
            </div>
        </div>

        <!-- Right: Control Panel & Card Info -->
        <div class="col-span-12 lg:col-span-4 flex flex-col space-y-4 h-full overflow-y-auto pr-1">
            
            <!-- Card Scan Section -->
            <div class="bg-gray-800 p-6 rounded-lg border border-gray-700 shadow-lg">
                <h3 class="text-sm font-semibold text-gray-400 uppercase mb-4 tracking-widest">Quẹt thẻ / Nhập thẻ</h3>
                <div class="relative">
                    <input type="text" placeholder="ID Thẻ (UID)..." class="w-full bg-gray-900 border border-gray-600 rounded-lg py-3 px-4 focus:outline-none focus:border-green-500 text-2xl text-center placeholder-gray-700">
                    <i class="fas fa-id-card absolute right-4 top-4 text-gray-600"></i>
                </div>
                <div class="grid grid-cols-2 gap-3 mt-4">
                    <button class="bg-green-600 hover:bg-green-700 py-3 rounded font-bold uppercase tracking-widest transition">Cho xe VÀO</button>
                    <button class="bg-blue-600 hover:bg-blue-700 py-3 rounded font-bold uppercase tracking-widest transition">Cho xe RA</button>
                </div>
            </div>

            <!-- Vehicle Detail -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 flex-grow shadow-lg">
                <h3 class="text-sm font-semibold text-gray-400 uppercase mb-4 tracking-widest border-b border-gray-700 pb-2">Thông tin xe</h3>
                <div class="space-y-3">
                    <div class="flex justify-between border-b border-gray-700 py-2">
                        <span class="text-gray-500">Mã thẻ:</span>
                        <span class="font-mono text-green-400">0012345678</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 py-2">
                        <span class="text-gray-500">Biển số cũ:</span>
                        <span class="font-bold">51G-888.88</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 py-2">
                        <span class="text-gray-500">Giờ vào:</span>
                        <span>27/02 08:30</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 py-2">
                        <span class="text-gray-500">Phí dịch vụ:</span>
                        <span class="text-yellow-400 font-bold">5.000 VNĐ</span>
                    </div>
                </div>
                
                <div class="mt-6 flex flex-col space-y-2">
                    <button class="bg-gray-700 hover:bg-gray-600 py-2 rounded text-sm transition">Mở Barie (Khẩn cấp)</button>
                    <button class="bg-red-900 hover:bg-red-800 py-2 rounded text-sm transition text-red-200 uppercase font-bold text-xs">Cảnh báo / Chặn thẻ</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer: Recent Transactions -->
    <footer class="bg-gray-800 p-2 h-32 border-t border-gray-700 overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="text-gray-500 uppercase border-b border-gray-700">
                <tr>
                    <th class="py-2 px-4">Giờ</th>
                    <th class="py-2 px-4">Biển số</th>
                    <th class="py-2 px-4">Làn</th>
                    <th class="py-2 px-4">Loại xe</th>
                    <th class="py-2 px-4">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <tr class="hover:bg-gray-750 transition cursor-pointer">
                    <td class="py-2 px-4">18:50:22</td>
                    <td class="py-2 px-4 font-bold text-green-400">51F-123.45</td>
                    <td class="py-2 px-4 text-blue-300">LÀN 1 VÀO</td>
                    <td class="py-2 px-4">Xe Máy</td>
                    <td class="py-2 px-4 italic text-gray-500">Đã lưu...</td>
                </tr>
                <tr class="hover:bg-gray-750 transition cursor-pointer">
                    <td class="py-2 px-4">18:48:10</td>
                    <td class="py-2 px-4 font-bold">59K-999.99</td>
                    <td class="py-2 px-4 text-orange-300">LÀN 2 RA</td>
                    <td class="py-2 px-4">Ô tô</td>
                    <td class="py-2 px-4 font-bold text-yellow-500">CHỜ THANH TOÁN</td>
                </tr>
            </tbody>
        </table>
    </footer>

</body>
</html>
