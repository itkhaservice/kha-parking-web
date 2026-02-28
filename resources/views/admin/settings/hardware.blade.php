<div id="tab-hardware" class="tab-pane">
    <div class="grid grid-cols-2 gap-6">
        
        <!-- CỘT TRÁI: CẤU HÌNH LÀN VÀO -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-[#108042]/30 shadow-sm relative pt-6">
                <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-in-alt mr-1"></i> Cấu hình Làn Vào (Lane In)
                </span>
                
                <!-- Camera In -->
                <div class="space-y-3 mb-4">
                    <div class="text-[10px] font-black text-gray-400 border-b border-dashed pb-1 uppercase italic">Hệ thống Camera Làn Vào</div>
                    <div class="f-row bg-blue-50/50 p-2 rounded border border-blue-100">
                        <span class="f-label !w-24 text-blue-800 font-bold">Cam Biển Số:</span>
                        <input type="text" value="rtsp://admin:123456@192.168.1.101:554/ch1/main" class="f-input mono text-[10px] flex-1 bg-white border-blue-200">
                        <button class="btn-action !h-6 px-2 ml-2 bg-blue-600 text-white border-blue-600" title="Xem thử"><i class="fas fa-eye"></i></button>
                    </div>
                    <div class="f-row bg-gray-50 p-2 rounded border border-gray-100">
                        <span class="f-label !w-24 text-gray-600 font-bold">Cam Toàn Cảnh:</span>
                        <input type="text" value="rtsp://admin:123456@192.168.1.102:554/ch1/main" class="f-input mono text-[10px] flex-1 border-gray-200 bg-white">
                        <button class="btn-action !h-6 px-2 ml-2 text-gray-500" title="Xem thử"><i class="fas fa-eye"></i></button>
                    </div>
                </div>

                <!-- Peripheral In -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Cổng COM Đầu Đọc</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" value="COM5" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" value="19200" class="f-input center !w-16"></div>
                        <button class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white">TEST KẾT NỐI</button>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Điều khiển Barrier</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" value="01" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">IP/COM:</span><input type="text" value="192.168.1.201" class="f-input center !w-full text-[10px]"></div>
                        <button class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white text-orange-600">MỞ THỬ BARRIER</button>
                    </div>
                </div>
            </div>

            <div class="tech-group bg-white !border-gray-300 shadow-sm relative pt-6">
                <span class="group-label !bg-gray-600 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm">
                    <i class="fas fa-microchip mr-1"></i> Tham số Nhận diện AI (ms)
                </span>
                <div class="grid grid-cols-3 gap-4">
                    <div class="f-row"><span class="f-label !w-auto mr-2">Độ trễ:</span><input type="text" value="1000" class="f-input center flex-1 font-bold text-blue-700"></div>
                    <div class="f-row"><span class="f-label !w-auto mr-2">Tin cậy:</span><input type="text" value="85%" class="f-input center flex-1 font-bold text-green-700"></div>
                    <div class="f-row"><span class="f-label !w-auto mr-2">Timeout:</span><input type="text" value="3000" class="f-input center flex-1"></div>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI: CẤU HÌNH LÀN RA -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-red-200 shadow-sm relative pt-6">
                <span class="group-label !bg-red-600 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-out-alt mr-1"></i> Cấu hình Làn Ra (Lane Out)
                </span>
                
                <!-- Camera Out -->
                <div class="space-y-3 mb-4">
                    <div class="text-[10px] font-black text-gray-400 border-b border-dashed pb-1 uppercase italic">Hệ thống Camera Làn Ra</div>
                    <div class="f-row bg-red-50/50 p-2 rounded border border-red-100">
                        <span class="f-label !w-24 text-red-800 font-bold">Cam Biển Số:</span>
                        <input type="text" value="rtsp://admin:123456@192.168.1.103:554/ch1/main" class="f-input mono text-[10px] flex-1 bg-white border-red-200">
                        <button class="btn-action !h-6 px-2 ml-2 bg-red-600 text-white border-red-600" title="Xem thử"><i class="fas fa-eye"></i></button>
                    </div>
                    <div class="f-row bg-gray-50 p-2 rounded border border-gray-100">
                        <span class="f-label !w-24 text-gray-600 font-bold">Cam Toàn Cảnh:</span>
                        <input type="text" value="rtsp://admin:123456@192.168.1.104:554/ch1/main" class="f-input mono text-[10px] flex-1 border-gray-200 bg-white">
                        <button class="btn-action !h-6 px-2 ml-2 text-gray-500" title="Xem thử"><i class="fas fa-eye"></i></button>
                    </div>
                </div>

                <!-- Peripheral Out -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Cổng COM Đầu Đọc</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" value="COM8" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" value="19200" class="f-input center !w-16"></div>
                        <button class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white">TEST KẾT NỐI</button>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Điều khiển Barrier</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" value="02" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">IP/COM:</span><input type="text" value="192.168.1.202" class="f-input center !w-full text-[10px]"></div>
                        <button class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white text-orange-600">MỞ THỬ BARRIER</button>
                    </div>
                </div>
            </div>

            <!-- NVR / Server Settings -->
            <div class="tech-group bg-white !border-blue-200 shadow-sm relative pt-6">
                <span class="group-label !bg-blue-700 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-hdd mr-1"></i> Đầu ghi NVR & Thiết bị mạng
                </span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <div class="f-row"><span class="f-label !w-16 text-gray-500">IP NVR:</span><input type="text" value="192.168.1.250" class="f-input mono flex-1 border-gray-200"></div>
                        <div class="f-row"><span class="f-label !w-16 text-gray-500">Port:</span><input type="text" value="37777" class="f-input center !w-24 border-gray-200"></div>
                    </div>
                    <div class="space-y-2">
                        <div class="f-row"><span class="f-label !w-16 text-gray-500">User:</span><input type="text" value="admin" class="f-input flex-1 border-gray-200"></div>
                        <div class="f-row"><span class="f-label !w-16 text-gray-500">Pass:</span><input type="password" value="******" class="f-input flex-1 border-gray-200"></div>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-dashed border-blue-100">
                    <label class="check-box bg-blue-50/50 p-2 border border-blue-100 rounded cursor-pointer">
                        <input type="checkbox" checked class="accent-blue-700">
                        <span class="text-[11px] font-bold text-blue-800 ml-2 uppercase italic">Ưu tiên lấy luồng từ NVR (Tiết kiệm băng thông)</span>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <!-- Final Action Row -->
    <div class="mt-6 flex justify-between items-center bg-gray-100 p-3 rounded-lg border border-gray-300 shadow-inner">
        <div class="flex gap-4">
            <button class="btn-action bg-white !h-10 px-6 font-black text-gray-600 border-gray-400 hover:bg-gray-200"><i class="fas fa-search-plus mr-2"></i>CĂN CHỈNH ZOOM CAMERA</button>
            <button class="btn-action bg-white !h-10 px-6 font-black text-[#108042] border-[#108042] hover:bg-green-50"><i class="fas fa-network-wired mr-2"></i>PINGS TOÀN BỘ THIẾT BỊ</button>
        </div>
        <div class="flex gap-3">
            <button onclick="window.location.href='{{ route('dashboard.guard') }}'" class="btn-action !h-10 px-8 font-black uppercase tracking-widest border-gray-400">THOÁT</button>
            <button class="btn-action btn-blue !h-10 px-12 font-black uppercase tracking-widest shadow-lg shadow-green-900/20">LƯU CẤU HÌNH PHẦN CỨNG</button>
        </div>
    </div>
</div>
