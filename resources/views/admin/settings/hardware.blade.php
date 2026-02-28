<div id="tab-hardware" class="tab-pane">
    <div class="grid grid-cols-2 gap-6">
        
        <!-- CỘT TRÁI: CẤU HÌNH LÀN VÀO -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-[#108042]/30 shadow-sm relative pt-6">
                <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-in-alt mr-1"></i> Cấu hình Làn Vào (Lane In)
                </span>
                
                <div class="space-y-3 mb-4">
                    <div class="f-row bg-blue-50/50 p-2 rounded border border-blue-100">
                        <span class="f-label !w-24 text-blue-800 font-bold">Cam Biển Số:</span>
                        <input type="text" name="cam_in_plate" value="{{ $settings['cam_in_plate'] ?? 'rtsp://admin:123456@192.168.1.101:554/ch1/main' }}" class="f-input mono text-[10px] flex-1 bg-white border-blue-200">
                    </div>
                    <div class="f-row bg-gray-50 p-2 rounded border border-gray-100">
                        <span class="f-label !w-24 text-gray-600 font-bold">Cam Toàn Cảnh:</span>
                        <input type="text" name="cam_in_view" value="{{ $settings['cam_in_view'] ?? 'rtsp://admin:123456@192.168.1.102:554/ch1/main' }}" class="f-input mono text-[10px] flex-1 border-gray-200 bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Đầu Đọc Thẻ (Vào)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="reader_in_com" id="reader_in_com" value="{{ $settings['reader_in_com'] ?? 'COM5' }}" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" name="reader_in_baud" value="{{ $settings['reader_in_baud'] ?? '19200' }}" class="f-input center !w-16"></div>
                        <button type="button" onclick="testComPort('reader_in_com')" class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white hover:bg-emerald-50">TEST TÍN HIỆU COM</button>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Barrier (Vào)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" name="barrier_in_id" value="{{ $settings['barrier_in_id'] ?? '01' }}" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="barrier_in_conn" id="barrier_in_com" value="{{ $settings['barrier_in_conn'] ?? 'COM10' }}" class="f-input center !w-full text-[10px]"></div>
                        <button type="button" onclick="testComPort('barrier_in_com')" class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white text-orange-600 hover:bg-orange-50">TEST TÍN HIỆU COM</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI: CẤU HÌNH LÀN RA -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-red-200 shadow-sm relative pt-6">
                <span class="group-label !bg-red-600 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-out-alt mr-1"></i> Cấu hình Làn Ra (Lane Out)
                </span>
                
                <div class="space-y-3 mb-4">
                    <div class="f-row bg-red-50/50 p-2 rounded border border-red-100">
                        <span class="f-label !w-24 text-red-800 font-bold">Cam Biển Số:</span>
                        <input type="text" name="cam_out_plate" value="{{ $settings['cam_out_plate'] ?? 'rtsp://admin:123456@192.168.1.103:554/ch1/main' }}" class="f-input mono text-[10px] flex-1 bg-white border-red-200">
                    </div>
                    <div class="f-row bg-gray-50 p-2 rounded border border-gray-100">
                        <span class="f-label !w-24 text-gray-600 font-bold">Cam Toàn Cảnh:</span>
                        <input type="text" name="cam_out_view" value="{{ $settings['cam_out_view'] ?? 'rtsp://admin:123456@192.168.1.104:554/ch1/main' }}" class="f-input mono text-[10px] flex-1 border-gray-200 bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Đầu Đọc Thẻ (Ra)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="reader_out_com" id="reader_out_com" value="{{ $settings['reader_out_com'] ?? 'COM8' }}" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" name="reader_out_baud" value="{{ $settings['reader_out_baud'] ?? '19200' }}" class="f-input center !w-16"></div>
                        <button type="button" onclick="testComPort('reader_out_com')" class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white hover:bg-emerald-50">TEST TÍN HIỆU COM</button>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Barrier (Ra)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" name="barrier_out_id" value="{{ $settings['barrier_out_id'] ?? '02' }}" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="barrier_out_conn" id="barrier_out_com" value="{{ $settings['barrier_out_conn'] ?? 'COM11' }}" class="f-input center !w-full text-[10px]"></div>
                        <button type="button" onclick="testComPort('barrier_out_com')" class="btn-action w-full mt-2 !h-6 text-[9px] font-black bg-white text-orange-600 hover:bg-orange-50">TEST TÍN HIỆU COM</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Final Action Row -->
    <div class="mt-6 flex justify-end gap-3">
        <button onclick="window.location.href='{{ route('dashboard.guard') }}'" class="btn-action !h-10 px-8 font-black uppercase tracking-widest border-gray-400">THOÁT</button>
        <button onclick="saveAllSettings()" class="btn-action btn-blue !h-10 px-12 font-black uppercase tracking-widest shadow-lg">LƯU CẤU HÌNH THIẾT BỊ</button>
    </div>
</div>
