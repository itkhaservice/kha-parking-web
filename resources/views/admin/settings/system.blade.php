<div id="tab-system" class="tab-pane active">
    <div class="grid grid-cols-2 gap-6">
        <!-- CỘT TRÁI -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-gray-300 shadow-sm relative pt-6">
                <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm">
                    <i class="fas fa-server mr-1"></i> MÁY CHỦ & KẾT NỐI SERVER
                </span>
                <div class="space-y-3">
                    <div class="f-row bg-gray-50 p-2 rounded border border-gray-100">
                        <span class="f-label !w-32 text-gray-600 font-bold">Server Name:</span>
                        <input type="text" value="DESKTOP-4P0F01E" class="f-input mono font-black flex-1 text-blue-700 border-blue-100 bg-white">
                        <label class="check-box ml-3 bg-[#108042]/10 px-2 py-1 rounded border border-[#108042]/20 cursor-pointer">
                            <input type="checkbox" checked class="accent-[#108042]">
                            <span class="text-[10px] font-black text-[#108042] uppercase ml-1">Kích hoạt</span>
                        </label>
                    </div>
                    <div class="f-row">
                        <span class="f-label !w-32 text-gray-600">Server Local:</span>
                        <input type="text" value="127.0.0.1" class="f-input flex-1 border-gray-200">
                        <span class="f-label !w-16 text-right text-gray-500">Cổng:</span>
                        <input type="text" value="C0" class="f-input center !w-16 font-bold border-gray-200 bg-gray-50">
                    </div>
                    
                    <div class="pt-2">
                        <div class="text-[10px] font-black text-[#108042] mb-3 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="bg-[#108042] w-2 h-2 rounded-full"></span>
                                KẾT NỐI DATABASE SQL SERVER
                            </div>
                            <button type="button" onclick="testDbConnection()" class="text-[9px] bg-white border border-[#108042] text-[#108042] px-2 py-0.5 rounded hover:bg-green-50 transition-all font-bold">
                                <i class="fas fa-plug mr-1"></i> KIỂM TRA KẾT NỐI
                            </button>
                        </div>
                        <div class="space-y-2 bg-gray-50/50 p-3 rounded-lg border border-dashed border-gray-300">
                            <div class="f-row"><span class="f-label !w-28 text-gray-500">UserName:</span><input type="text" id="db_user" value="sa" class="f-input flex-1 border-gray-200"></div>
                            <div class="f-row"><span class="f-label !w-28 text-gray-500">Password:</span><input type="password" id="db_pass" value="******" class="f-input flex-1 border-gray-200"></div>
                            <div class="f-row"><span class="f-label !w-28 text-gray-700 font-bold">Database:</span><input type="text" id="db_name" value="khaservice_parking" class="f-input font-black text-red-700 flex-1 border-red-100 bg-red-50/30"></div>
                        </div>
                        <div id="db_test_status" class="mt-2 text-[10px] font-bold hidden"></div>
                    </div>
                </div>
            </div>

            <div class="tech-group bg-white !border-gray-300 shadow-sm relative pt-6">
                <span class="group-label !bg-gray-600 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm">
                    <i class="fas fa-folder-open mr-1"></i> ĐƯỜNG DẪN LƯU HÌNH ẢNH
                </span>
                <div class="space-y-2">
                    <div class="f-row"><span class="f-label !w-28 text-gray-600">Local Path:</span><input type="text" value="D:\PARKING_IMAGES" class="f-input flex-1 mono text-[11px] border-gray-200"></div>
                    <div class="f-row"><span class="f-label !w-28 text-gray-600">URL Server:</span><input type="text" value="http://117.4.91.45:85/images" class="f-input flex-1 mono text-[11px] text-blue-600 underline border-gray-200"></div>
                    <div class="f-row"><span class="f-label !w-28 text-gray-600">Backup Path:</span><input type="text" value="E:\BACKUP_DB" class="f-input flex-1 mono text-[11px] border-gray-200"></div>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-[#108042]/30 shadow-sm relative pt-6 h-full">
                <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-cogs mr-1"></i> Tùy chọn Vận hành hệ thống
                </span>
                <div class="grid grid-cols-1 gap-3 p-2 bg-[#108042]/5 rounded-lg border border-[#108042]/10">
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" checked class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Tăng tốc độ xử lý khi quẹt thẻ</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Đồng bộ dữ liệu (Chế độ 3 máy)</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" checked class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Tự động kết nối lại khi rớt Server</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">In vé tự động cho xe hơi (XH)</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Chế độ xem hình Online (DDNS)</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" checked class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-[#108042] ml-2 uppercase italic">Hiển thị báo cáo doanh thu khi ra ca</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" checked class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Đọc giá tiền bằng giọng nói AI</span>
                    </label>
                    <label class="check-box p-2 bg-white border border-gray-200 rounded hover:border-[#108042] transition-all cursor-pointer shadow-sm">
                        <input type="checkbox" checked class="w-4 h-4 accent-[#108042]">
                        <span class="text-[11px] font-bold text-gray-700 ml-2 uppercase">Phát âm thanh cảnh báo hệ thống</span>
                    </label>
                </div>
                
                <div class="mt-6 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-[10px] text-yellow-800 leading-relaxed font-medium">
                        <i class="fas fa-exclamation-triangle mr-1"></i> <strong>LƯU Ý:</strong> Các thay đổi trong tab Hệ thống có thể yêu cầu khởi động lại dịch vụ <strong>KHA-PARKING SERVICE</strong> để có hiệu lực hoàn toàn.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
