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
    <div class="bg-gray-50 border border-gray-300 p-3 mb-3 rounded shadow-sm">
        <div class="grid grid-cols-5 gap-4 items-start">
            <!-- Cột 1: Giờ Múi 1 & Miễn phí -->
            <div class="space-y-2 border-r border-gray-200 pr-3">
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="pt-1">
                    <label class="check-box font-bold text-gray-800"><input type="checkbox" checked class="accent-[#108042]"><span>TG Miễn phí</span></label>
                    <input type="text" value="300" class="f-input center !w-full mt-1 font-bold text-green-700 border-green-500 bg-green-50">
                </div>
            </div>

            <!-- Cột 2: Giá Tiền Múi 1 -->
            <div class="space-y-2 border-r border-gray-200 pr-3">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền XS</span><input type="text" value="5000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền TG</span><input type="text" value="5000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>

            <!-- Cột 3: Giờ Múi 2 -->
            <div class="space-y-2 border-r border-gray-200 pr-3">
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Từ Giờ</span><input type="text" value="22:00:00" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="f-row"><span class="f-label !w-16 text-gray-600">Đến Giờ</span><input type="text" value="23:59:59" class="f-input center flex-1 font-bold text-blue-700"></div>
                <div class="text-[9px] italic text-gray-400 mt-4 leading-tight">* Khung giờ đêm tính từ 22h00</div>
            </div>

            <!-- Cột 4: Giá Tiền Múi 2 -->
            <div class="space-y-2 border-r border-gray-200 pr-3">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền XS</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600 border-red-200 bg-red-50"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">Giá Tiền TG</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600 border-red-200 bg-red-50"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>

            <!-- Cột 5: Giá Ngày -->
            <div class="space-y-2">
                <div class="f-row"><span class="f-label !w-20 text-gray-700">1 Ngày XS</span><input type="text" value="15000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-700">1 Ngày TG</span><input type="text" value="15000" class="f-input right font-bold flex-1 text-gray-800"></div>
                <div class="f-row"><span class="f-label !w-20 text-gray-400">1 Ngày XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
        </div>
        <div class="mt-2 text-[9px] text-gray-400 italic text-center border-t border-gray-200 pt-1">
            (thời gian miễn phí tính bằng giây, vui lòng nhập vào số giây)
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

    <!-- Tính tiền theo ngày (Trọn gói) -->
    <div class="bg-gray-100 p-3 mb-3 rounded border border-gray-300 shadow-sm relative mt-5">
        <span class="absolute -top-3 left-2 bg-gray-600 text-white text-[10px] font-bold px-3 py-0.5 rounded shadow-sm uppercase">1. Tính tiền theo ngày</span>
        <div class="flex items-center gap-4 bg-white p-2 rounded border border-gray-200">
            <label class="check-box font-bold !mb-0 text-gray-700 cursor-pointer flex-shrink-0"><input type="checkbox" class="accent-gray-600"><span>Kích hoạt tính tiền trọn gói theo ngày</span></label>
            <div class="h-6 w-[1px] bg-gray-300 mx-2"></div>
            <div class="f-row flex-1"><span class="f-label !w-auto mr-2 text-gray-600 font-bold">Giá trọn gói (VNĐ):</span><input type="text" value="15000" class="f-input right !w-40 font-black text-gray-800 text-[13px]"></div>
            <div class="text-[9px] italic text-gray-400 ml-auto">* Áp dụng khi xe gửi quá 24h hoặc theo quy định ngày</div>
        </div>
    </div>

    <!-- Tính tiền theo loại vé (Chi tiết phương tiện) -->
    <div class="bg-slate-100 p-3 mb-3 rounded border border-slate-300 shadow-sm relative mt-5">
        <span class="absolute -top-3 left-2 bg-slate-700 text-white text-[10px] font-bold px-3 py-0.5 rounded shadow-sm uppercase">2. Tính tiền theo loại vé & Phương tiện</span>
        <div class="grid grid-cols-3 gap-4">
            <!-- Cột 1: Quy tắc & Đêm -->
            <div class="bg-white p-2 rounded border border-slate-200 space-y-2 shadow-sm">
                <label class="check-box text-[10px] font-bold text-slate-800"><input type="checkbox" class="accent-slate-800"><span>Bật tính năng theo loại vé</span></label>
                <div class="f-row"><span class="f-label !w-20 text-slate-800">Số tiếng min:</span><input type="text" value="1" class="f-input center !w-12 font-bold text-slate-700"><span class="text-[8px] italic ml-1 text-slate-400">(0 = tính ngày)</span></div>
                <div class="pt-1 border-t border-slate-100">
                    <div class="f-row"><span class="f-label !w-24 text-blue-800 font-bold">Tiền đêm TG:</span><input type="text" class="f-input right flex-1 font-bold text-gray-700 border-blue-100 bg-blue-50/30"></div>
                    <div class="f-row"><span class="f-label !w-24 text-blue-800 font-bold">Tiền đêm XS:</span><input type="text" class="f-input right flex-1 font-bold text-gray-700 border-blue-100 bg-blue-50/30"></div>
                </div>
            </div>
            <!-- Cột 2: Xe máy & Xe đạp -->
            <div class="bg-white p-2 rounded border border-slate-200 space-y-2 shadow-sm flex flex-col justify-center">
                <div class="f-row"><span class="f-label !w-20 text-indigo-800 font-bold">Giá Xe Máy:</span><input type="text" class="f-input right flex-1 font-black text-gray-800 border-indigo-100 bg-indigo-50/30"></div>
                <div class="f-row"><span class="f-label !w-20 text-indigo-800 font-bold">Giá Xe Đạp:</span><input type="text" class="f-input right flex-1 font-black text-gray-800 border-indigo-100 bg-indigo-50/30"></div>
            </div>
            <!-- Cột 3: Xe hơi & Tay ga -->
            <div class="bg-white p-2 rounded border border-slate-200 space-y-2 shadow-sm">
                <div class="f-row"><span class="f-label !w-24 text-slate-800 font-bold">Giờ Xe Hơi:</span><input type="text" value="1" class="f-input center !w-12 font-bold text-slate-700"></div>
                <div class="pt-1 border-t border-slate-100">
                    <div class="f-row"><span class="f-label !w-24 text-red-700 font-bold">Giá Xe Hơi:</span><input type="text" class="f-input right flex-1 font-black text-red-600 border-red-100 bg-red-50"></div>
                    <div class="f-row"><span class="f-label !w-24 text-red-700 font-bold">Giá Tay Ga:</span><input type="text" class="f-input right flex-1 font-black text-red-600 border-red-100 bg-red-50"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tính tiền theo giờ (Lũy tiến bậc thang) -->
    <div class="bg-emerald-50/50 p-4 rounded-lg border border-emerald-200 shadow-sm relative mt-8">
        <div class="absolute -top-4 left-4 flex items-center gap-2">
            <span class="bg-emerald-600 text-white text-[11px] font-black px-4 py-1 rounded-full shadow-md uppercase tracking-wider">
                <i class="fas fa-chart-line mr-2"></i>4. Lũy tiến bậc thang theo giờ
            </span>
        </div>
        
        <div class="flex items-center justify-between mb-4 mt-2">
            <label class="check-box font-bold text-emerald-900 cursor-pointer flex items-center gap-2 bg-white px-3 py-1.5 rounded-md border border-emerald-100 shadow-sm">
                <input type="checkbox" class="w-4 h-4 accent-emerald-600">
                <span class="text-[11px]">Kích hoạt tính toán giá theo bậc (Lũy tiến thời gian)</span>
            </label>
            <span class="text-[10px] italic text-emerald-600 font-medium bg-emerald-100/50 px-2 py-0.5 rounded">
                * Quy tắc: Bậc 1 &lt; Bậc 2 &lt; Bậc 3 (Ưu tiên tính theo mốc giờ cao nhất)
            </span>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <!-- BẬC 1 -->
            <div class="bg-white p-3 border border-emerald-200 rounded-lg relative shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between border-b border-emerald-50 pb-2 mb-3">
                    <span class="bg-blue-600 text-white text-[9px] font-black px-2 py-0.5 rounded uppercase">Bậc 1</span>
                    <i class="fas fa-clock text-blue-200"></i>
                </div>
                <div class="space-y-3">
                    <div class="f-row justify-between bg-blue-50/30 p-1.5 rounded border border-blue-100/50">
                        <span class="f-label !w-auto text-blue-800 font-bold">Nếu số giờ &lt;</span>
                        <div class="flex items-center">
                            <input type="text" class="f-input center !w-14 font-black text-blue-700 border-blue-200 focus:ring-2 focus:ring-blue-100">
                            <span class="text-[10px] font-bold text-blue-400 ml-1">H</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-1">
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe Số:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe TG:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                    </div>
                </div>
            </div>

            <!-- BẬC 2 -->
            <div class="bg-white p-3 border border-emerald-200 rounded-lg relative shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between border-b border-emerald-50 pb-2 mb-3">
                    <span class="bg-orange-600 text-white text-[9px] font-black px-2 py-0.5 rounded uppercase">Bậc 2</span>
                    <i class="fas fa-clock text-orange-200"></i>
                </div>
                <div class="space-y-3">
                    <div class="f-row justify-between bg-orange-50/30 p-1.5 rounded border border-orange-100/50">
                        <span class="f-label !w-auto text-orange-800 font-bold">Nếu số giờ &lt;</span>
                        <div class="flex items-center">
                            <input type="text" class="f-input center !w-14 font-black text-orange-700 border-orange-200 focus:ring-2 focus:ring-orange-100">
                            <span class="text-[10px] font-bold text-orange-400 ml-1">H</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-1">
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe Số:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe TG:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                    </div>
                </div>
            </div>

            <!-- BẬC 3 -->
            <div class="bg-white p-3 border border-emerald-200 rounded-lg relative shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between border-b border-emerald-50 pb-2 mb-3">
                    <span class="bg-red-600 text-white text-[9px] font-black px-2 py-0.5 rounded uppercase">Bậc 3</span>
                    <i class="fas fa-clock text-red-200"></i>
                </div>
                <div class="space-y-3">
                    <div class="f-row justify-between bg-red-50/30 p-1.5 rounded border border-red-100/50">
                        <span class="f-label !w-auto text-red-800 font-bold">Nếu số giờ &gt;</span>
                        <div class="flex items-center">
                            <input type="text" class="f-input center !w-14 font-black text-red-700 border-red-200 focus:ring-2 focus:ring-red-100">
                            <span class="text-[10px] font-bold text-red-400 ml-1">H</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-1">
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe Số:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                        <div class="f-row"><span class="f-label !w-24 text-gray-600">Giá Xe TG:</span><input type="text" class="f-input right flex-1 font-bold text-gray-800"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

