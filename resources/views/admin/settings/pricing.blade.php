<div id="tab-pricing" class="tab-pane">
    <!-- Header Options -->
    <div class="flex justify-between items-center border-b border-gray-300 pb-2 mb-3">
        <div class="flex gap-4 font-bold text-[11px] flex-wrap text-gray-800">
            <label class="flex items-center gap-1 cursor-pointer select-none hover:text-blue-600 transition-colors"><input type="checkbox" checked class="win-check accent-[#108042]"> PP1 :</label>
            <label class="flex items-center gap-1 text-red-700 cursor-pointer select-none hover:text-red-800 transition-colors"><input type="radio" name="pp" checked class="accent-red-600"> Loại 1 (Qđ 35)</label>
            <label class="flex items-center gap-1 cursor-pointer select-none hover:text-blue-600 transition-colors"><input type="radio" name="pp" class="accent-[#108042]"> Loại 2 (2 múi giờ)</label>
            <label class="flex items-center gap-1 cursor-pointer select-none hover:text-blue-600 transition-colors"><input type="radio" name="pp" class="accent-[#108042]"> Loại 3 (3H múi giờ)</label>
            <label class="flex items-center gap-1 cursor-pointer select-none hover:text-blue-600 transition-colors"><input type="radio" name="pp" class="accent-[#108042]"> Loại 4 (LT-AL)</label>
            <label class="flex items-center gap-1 cursor-pointer select-none hover:text-blue-600 transition-colors"><input type="radio" name="pp" class="accent-[#108042]"> Loại 5 (Q35 Nhóm 2)</label>
        </div>
        <button onclick="toggleGuide()" class="text-[#108042] italic underline text-[11px] cursor-pointer font-bold hover:text-green-800 transition-colors">Xem chi tiết loại bảng giá</button>
    </div>

    <!-- Main Pricing Matrix -->
    <div class="grid grid-cols-3 gap-3 bg-gray-50 border border-gray-300 p-3 mb-3 rounded shadow-sm">
        <!-- Múi giờ 1 -->
        <div class="space-y-2">
            <div class="f-row"><span class="f-label !w-16 text-gray-600">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center !w-24 font-bold text-blue-700"></div>
            <div class="f-row"><span class="f-label !w-16 text-gray-600">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center !w-24 font-bold text-blue-700"></div>
            <div class="pt-2">
                <label class="check-box font-bold text-gray-800"><input type="checkbox" checked class="accent-[#108042]"><span>Thời gian miễn phí</span></label>
                <div class="flex items-center gap-2 mt-1">
                    <input type="text" value="300" class="f-input center !w-16 ml-6 font-bold text-green-700 border-green-500 bg-green-50">
                    <span class="text-[9px] italic text-gray-500">(giây)</span>
                </div>
            </div>
        </div>
        <!-- Giá Tiền Múi 1 & 2 -->
        <div class="grid grid-cols-2 gap-3 border-l border-gray-200 pl-3">
            <div class="space-y-2">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền XS</span><input type="text" value="5000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền TG</span><input type="text" value="5000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
            <div class="space-y-2">
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Từ Giờ</span><input type="text" value="22:00:00" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Đến Giờ</span><input type="text" value="23:59:59" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="f-row"><span class="f-label !w-16 text-gray-400">Giá XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
        </div>
        <!-- Giá Ngày & Giá Tiền XS/TG Múi 2 -->
        <div class="grid grid-cols-2 gap-3 border-l border-gray-200 pl-3">
             <div class="space-y-2">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền XS</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600 border-red-200 bg-red-50"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền TG</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600 border-red-200 bg-red-50"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
            <div class="space-y-2 border-l border-gray-200 pl-3">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">1 Ngày XS</span><input type="text" value="15000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">1 Ngày TG</span><input type="text" value="15000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">1 Ngày XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền xe hơi -->
    <div class="tech-group !bg-blue-50/30 !mb-3 !py-3 !border-blue-200 shadow-sm">
        <span class="group-label !bg-blue-600 !text-white !font-bold !px-3 !py-0.5 !top-[-10px] !left-2 rounded shadow-sm">Tính tiền xe hơi</span>
        <div class="grid grid-cols-2 gap-8 px-2">
            <div class="flex gap-4 items-center bg-white p-2 rounded border border-blue-100 shadow-sm">
                <div class="space-y-2">
                    <div class="f-row"><span class="f-label !w-12 text-gray-600">Từ</span><input type="text" value="05:30:00" class="f-input center !w-20 font-bold text-blue-700"></div>
                    <div class="f-row"><span class="f-label !w-12 text-gray-600">Đến</span><input type="text" value="12:00:00" class="f-input center !w-20 font-bold text-blue-700"></div>
                </div>
                <div class="f-row flex-1 bg-blue-50 p-2 rounded"><span class="f-label !w-auto font-bold text-blue-800 mr-2">GIÁ:</span><input type="text" value="20000" class="f-input right flex-1 font-black text-blue-700 text-[13px] border-blue-200"></div>
            </div>
            <div class="flex gap-4 items-center bg-white p-2 rounded border border-blue-100 shadow-sm">
                <div class="space-y-2">
                    <div class="f-row"><span class="f-label !w-12 text-gray-600">Từ</span><input type="text" value="12:00:00" class="f-input center !w-20 font-bold text-blue-700"></div>
                    <div class="f-row"><span class="f-label !w-12 text-gray-600">Đến</span><input type="text" value="23:59:59" class="f-input center !w-20 font-bold text-blue-700"></div>
                </div>
                <div class="f-row flex-1 bg-blue-50 p-2 rounded"><span class="f-label !w-auto font-bold text-blue-800 mr-2">GIÁ:</span><input type="text" value="30000" class="f-input right flex-1 font-black text-blue-700 text-[13px] border-blue-200"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền vé tháng -->
    <div class="bg-[#EBF5FF] p-3 mb-3 rounded border border-[#A4CAFE] shadow-sm relative mt-5">
        <span class="absolute -top-3 left-2 bg-[#1C64F2] text-white text-[10px] font-bold px-3 py-0.5 rounded shadow-sm">CẤU HÌNH VÉ THÁNG</span>
        <label class="check-box mb-2 text-[11px] font-bold text-[#1E429F] cursor-pointer"><input type="checkbox" class="accent-[#1C64F2]"><span>Kích hoạt tính năng miễn phí khung giờ (A → B)</span></label>
        <div class="flex justify-between items-center px-4 bg-white/60 p-2 rounded border border-[#BFDBFE]">
            <div class="flex gap-8 items-center">
                <div class="f-row"><span class="f-label !w-auto text-[#1E429F] mr-2">Giờ A (Bắt đầu):</span><input type="text" value="09:18:11" class="f-input center !w-24 font-bold text-[#1C64F2] border-[#76A9FA]"></div>
                <div class="f-row"><span class="f-label !w-auto text-[#1E429F] mr-2">Giờ B (Kết thúc):</span><input type="text" value="09:18:11" class="f-input center !w-24 font-bold text-[#1C64F2] border-[#76A9FA]"></div>
            </div>
            <div class="f-row"><span class="f-label !w-auto text-[#1E429F] font-bold mr-2">Phí Ngoài Giờ:</span><input type="text" class="f-input right !w-32 font-bold text-red-600 border-red-200 bg-red-50"></div>
        </div>
        <div class="text-center text-[#E02424] font-black text-[10px] my-2 uppercase tracking-[3px] opacity-70">————————————— MIỄN PHÍ TRONG KHUNG GIỜ —————————————</div>
        <div class="f-row justify-end pr-4"><span class="f-label !w-auto text-[#1E429F] font-bold mr-2">Giá qua đêm (tính từ 0h):</span><input type="text" class="f-input right !w-32 font-black text-red-600 border-red-200 bg-red-50"></div>
    </div>

    <!-- Tính tiền theo ngày / Nhiều loại xe -->
    <div class="bg-gray-100 p-3 mb-3 rounded border border-gray-300 shadow-sm relative mt-5">
        <span class="absolute -top-3 left-2 bg-gray-600 text-white text-[10px] font-bold px-3 py-0.5 rounded shadow-sm">TÙY CHỌN NÂNG CAO</span>
        <div class="grid grid-cols-2 gap-4 mb-2">
            <div class="flex items-center gap-2 bg-white p-1.5 rounded border border-gray-200">
                <label class="check-box font-bold !mb-0 text-gray-700 cursor-pointer"><input type="checkbox" class="accent-gray-600"><span>Tính tiền theo ngày</span></label>
                <div class="f-row ml-auto"><span class="f-label !w-auto mr-2">Giá trọn gói:</span><input type="text" value="15000" class="f-input right !w-28 font-bold text-gray-800"></div>
            </div>
            <label class="check-box font-bold !mb-0 bg-white p-1.5 rounded border border-gray-200 cursor-pointer text-gray-700 flex items-center"><input type="checkbox" class="accent-gray-600"><span>Tính tiền nhiều loại vé ô tô</span></label>
        </div>
        <div class="grid grid-cols-3 gap-4 pt-2 border-t border-dashed border-gray-300">
            <div class="bg-white p-2 rounded border border-gray-200 space-y-2">
                <label class="check-box text-[10px] font-bold text-blue-800"><input type="checkbox" class="accent-blue-800"><span>Tính tiền theo loại vé</span></label>
                <div class="f-row"><span class="f-label !w-16 text-blue-800">Số tiếng</span><input type="text" value="1" class="f-input center !w-12 font-bold"><span class="text-[9px] italic ml-1 text-gray-400">(0 = tính ngày)</span></div>
                <div class="f-row"><span class="f-label !w-24 text-blue-800">Đêm TG</span><input type="text" class="f-input right flex-1 font-bold text-gray-700"></div>
                <div class="f-row"><span class="f-label !w-24 text-blue-800">Đêm XS</span><input type="text" class="f-input right flex-1 font-bold text-gray-700"></div>
            </div>
            <div class="bg-white p-2 rounded border border-gray-200 space-y-2 flex flex-col justify-center">
                <div class="f-row"><span class="f-label !w-20 text-blue-800">Tiền xe máy</span><input type="text" class="f-input right flex-1 font-bold text-gray-700"></div>
                <div class="f-row"><span class="f-label !w-20 text-blue-800">Tiền xe đạp</span><input type="text" class="f-input right flex-1 font-bold text-gray-700"></div>
            </div>
            <div class="bg-white p-2 rounded border border-gray-200 space-y-2">
                <div class="f-row"><span class="f-label !w-24 text-blue-800">Giờ xe hơi</span><input type="text" value="1" class="f-input center !w-12 font-bold"></div>
                <div class="f-row"><span class="f-label !w-24 text-red-700 font-bold">Giá Hơi</span><input type="text" class="f-input right flex-1 font-black text-red-600 border-red-100 bg-red-50"></div>
                <div class="f-row"><span class="f-label !w-24 text-red-700 font-bold">Giá Tay Ga</span><input type="text" class="f-input right flex-1 font-black text-red-600 border-red-100 bg-red-50"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền theo giờ (Bậc thang) -->
    <div class="bg-indigo-50 p-3 rounded border border-indigo-200 shadow-sm relative mt-5">
        <span class="absolute -top-3 left-2 bg-indigo-600 text-white text-[10px] font-bold px-3 py-0.5 rounded shadow-sm">LŨY TIẾN BẬC THANG</span>
        <label class="check-box mb-2 text-[10px] font-bold text-indigo-900 cursor-pointer"><input type="checkbox" class="accent-indigo-600"><span>Kích hoạt tính lũy tiến (Bậc 1 < Bậc 2 < Bậc 3)</span></label>
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white p-2 border border-indigo-200 rounded relative shadow-sm">
                <span class="absolute right-0 top-0 bg-red-600 text-white text-[9px] font-black px-1.5 py-0.5 rounded-bl">BẬC 1</span>
                <div class="f-row mt-1"><span class="f-label !w-16 text-indigo-800">Số giờ <</span><input type="text" class="f-input center !w-16 font-bold text-indigo-700 border-indigo-200 bg-indigo-50"></div>
                <div class="f-row mt-2"><span class="f-label !w-20 text-gray-600">Giá Xe Số</span><input type="text" class="f-input right flex-1 font-bold"></div>
                <div class="f-row mt-1"><span class="f-label !w-20 text-gray-600">Giá Xe TG</span><input type="text" class="f-input right flex-1 font-bold"></div>
            </div>
            <div class="bg-white p-2 border border-indigo-200 rounded relative shadow-sm">
                <span class="absolute right-0 top-0 bg-red-600 text-white text-[9px] font-black px-1.5 py-0.5 rounded-bl">BẬC 2</span>
                <div class="f-row mt-1"><span class="f-label !w-16 text-indigo-800">Số giờ <</span><input type="text" class="f-input center !w-16 font-bold text-indigo-700 border-indigo-200 bg-indigo-50"></div>
                <div class="f-row mt-2"><span class="f-label !w-20 text-gray-600">Giá Xe Số</span><input type="text" class="f-input right flex-1 font-bold"></div>
                <div class="f-row mt-1"><span class="f-label !w-20 text-gray-600">Giá Xe TG</span><input type="text" class="f-input right flex-1 font-bold"></div>
            </div>
            <div class="bg-white p-2 border border-indigo-200 rounded relative shadow-sm">
                <span class="absolute right-0 top-0 bg-red-600 text-white text-[9px] font-black px-1.5 py-0.5 rounded-bl">BẬC 3</span>
                <div class="f-row mt-1"><span class="f-label !w-16 text-indigo-800">Số giờ <</span><input type="text" class="f-input center !w-16 font-bold text-indigo-700 border-indigo-200 bg-indigo-50"></div>
                <div class="f-row mt-2"><span class="f-label !w-20 text-gray-600">Giá Xe Số</span><input type="text" class="f-input right flex-1 font-bold"></div>
                <div class="f-row mt-1"><span class="f-label !w-20 text-gray-600">Giá Xe TG</span><input type="text" class="f-input right flex-1 font-bold"></div>
            </div>
        </div>
    </div>
</div>

