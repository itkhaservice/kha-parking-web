<div id="tab-hardware" class="tab-pane">
    <div class="grid-2">
        <div>
            <div class="tech-group">
                <span class="group-label">Làn bãi & Nhận diện AI</span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="sub-box border-l-4 border-blue-900">
                        <div class="text-[10px] font-black text-blue-900 mb-2 uppercase italic">Làn Vào</div>
                        <div class="f-row"><span class="f-label !w-20">Cam Xe:</span><input type="text" value="3" class="f-input center"></div>
                        <div class="f-row"><span class="f-label !w-20">Cam Mặt:</span><input type="text" value="0" class="f-input center"></div>
                    </div>
                    <div class="sub-box border-l-4 border-orange-600">
                        <div class="text-[10px] font-black text-orange-900 mb-2 uppercase italic">Làn Ra</div>
                        <div class="f-row"><span class="f-label !w-20">Cam Xe:</span><input type="text" value="2" class="f-input center"></div>
                        <div class="f-row"><span class="f-label !w-20">Cam Mặt:</span><input type="text" value="1" class="f-input center"></div>
                    </div>
                </div>
                <div class="section-title mt-4 mb-2 text-[10px] font-black text-gray-400">THAM SỐ NHẬN DIỆN AI (MS)</div>
                <div class="flex gap-4">
                    <div class="f-row flex-1"><span class="f-label !w-12 text-green-700">Vào:</span><input type="text" value="1000" class="f-input center font-bold flex-1"></div>
                    <div class="f-row flex-1"><span class="f-label !w-12 text-orange-700">Ra:</span><input type="text" value="1000" class="f-input center font-bold flex-1"></div>
                    <div class="f-row flex-1"><span class="f-label !w-12 text-right">Hậu:</span><input type="text" value="100" class="f-input center"></div>
                </div>
            </div>
        </div>
        <div>
            <div class="tech-group">
                <span class="group-label">Đầu ghi & Cổng COM</span>
                <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                    <div class="f-row"><span class="f-label !w-16">IP NVR:</span><input type="text" value="192.168.1.250" class="f-input mono flex-1"></div>
                    <div class="f-row"><span class="f-label !w-16 text-right">Port:</span><input type="text" value="37777" class="f-input mono !flex-none w-16 center"></div>
                    <div class="f-row"><span class="f-label !w-16">User:</span><input type="text" value="admin" class="f-input flex-1"></div>
                    <div class="f-row"><span class="f-label !w-16 text-right">Pass:</span><input type="password" value="******" class="f-input flex-1"></div>
                </div>
                <label class="check-box mt-2 bg-blue-50 p-1 border border-blue-100"><input type="checkbox" checked><span class="text-xs font-bold text-blue-800 uppercase">☑ Hình ảnh HD (High Quality)</span></label>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="sub-box border-dashed border-gray-400">
                        <div class="text-[9px] font-bold text-blue-800 underline mb-1 uppercase">COM VÀO</div>
                        <div class="f-row"><span class="f-label !w-10">Cổng:</span><input type="text" value="5" class="f-input center flex-1"></div>
                        <div class="f-row"><span class="f-label !w-10">Baud:</span><input type="text" value="19200" class="f-input center flex-1"></div>
                        <label class="check-box mt-1"><input type="checkbox"><span class="text-[10px]">UHF</span></label>
                    </div>
                    <div class="sub-box border-dashed border-gray-400">
                        <div class="text-[9px] font-bold text-orange-800 underline mb-1 uppercase">COM RA</div>
                        <div class="f-row"><span class="f-label !w-10">Cổng:</span><input type="text" value="8" class="f-input center flex-1"></div>
                        <div class="f-row"><span class="f-label !w-10">Baud:</span><input type="text" value="19200" class="f-input center flex-1"></div>
                        <label class="check-box mt-1"><input type="checkbox"><span class="text-[10px]">UHF</span></label>
                    </div>
                </div>
                <button class="btn-action w-full mt-2 bg-gray-50"><i class="fas fa-search-plus"></i> CHỈNH ZOOM CAMERA</button>
            </div>
        </div>
    </div>
</div>
