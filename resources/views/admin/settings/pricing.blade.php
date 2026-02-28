<div id="tab-pricing" class="tab-pane">
    <!-- Header Options -->
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #999; padding-bottom: 5px; margin-bottom: 10px;">
        <div style="display: flex; gap: 12px; font-weight: bold; font-size: 10px; flex-wrap: wrap; color: #000;">
            <label class="flex items-center gap-1"><input type="checkbox" checked class="win-check"> PP1 :</label>
            <label class="flex items-center gap-1 text-red-700"><input type="radio" name="pp" checked> Loại 1(Qđ 35)</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 2(2 múi giờ)</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 3(3H múi giờ)</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 4(LT-AL)</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 5(Q35 Nhóm 2)</label>
        </div>
        <button onclick="toggleGuide()" class="text-red-700 italic underline text-[10px] cursor-pointer font-bold">Xem chi tiết loại bảng giá</button>
    </div>

    <!-- Main Pricing Matrix -->
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; background: #F0F0F0; border: 1px solid #999; padding: 8px; margin-bottom: 8px;">
        <!-- Múi giờ 1 -->
        <div class="space-y-1">
            <div class="f-row"><span class="f-label !w-16">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center !w-24"></div>
            <div class="f-row"><span class="f-label !w-16">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center !w-24"></div>
            <div class="pt-2">
                <label class="check-box font-bold"><input type="checkbox" checked><span>Thời gian miễn phí</span></label>
                <div class="flex items-center gap-2 mt-1">
                    <input type="text" value="300" class="f-input center !w-16 ml-6">
                    <span class="text-[9px] italic text-gray-500">(thời gian miễn phí tính bằng giây,vui lòng nhập vào số giây)</span>
                </div>
            </div>
        </div>
        <!-- Giá Tiền Múi 1 & 2 -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-1">
                <div class="f-row"><span class="f-label !w-20">Giá Tiền XS</span><input type="text" value="5000" class="f-input right font-bold flex-1"></div>
                <div class="f-row"><span class="f-label !w-20">Giá Tiền TG</span><input type="text" value="5000" class="f-input right font-bold flex-1"></div>
                <div class="f-row"><span class="f-label !w-20">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1"></div>
            </div>
            <div class="space-y-1">
                <div class="f-row"><span class="f-label !w-16">Từ Giờ</span><input type="text" value="22:00:00" class="f-input center flex-1"></div>
                <div class="f-row"><span class="f-label !w-16">Đến Giờ</span><input type="text" value="23:59:59" class="f-input center flex-1"></div>
                <div class="f-row"><span class="f-label !w-16 text-gray-400">Giá XĐ</span><input type="text" value="0" class="f-input right flex-1"></div>
            </div>
        </div>
        <!-- Giá Ngày & Giá Tiền XS/TG Múi 2 -->
        <div class="grid grid-cols-2 gap-4">
             <div class="space-y-1">
                <div class="f-row"><span class="f-label !w-20">Giá Tiền XS</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600"></div>
                <div class="f-row"><span class="f-label !w-20">Giá Tiền TG</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600"></div>
                <div class="f-row"><span class="f-label !w-20">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right flex-1"></div>
            </div>
            <div class="space-y-1 border-l border-gray-400 pl-2">
                <div class="f-row"><span class="f-label !w-20">1 Ngày XS</span><input type="text" value="15000" class="f-input right font-bold flex-1"></div>
                <div class="f-row"><span class="f-label !w-20">1 Ngày TG</span><input type="text" value="15000" class="f-input right font-bold flex-1"></div>
                <div class="f-row"><span class="f-label !w-20">1 Ngày XĐ</span><input type="text" value="0" class="f-input right flex-1 text-gray-400"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền xe hơi -->
    <div class="tech-group !bg-gray-100/50 !mb-2 !py-2">
        <span class="group-label !bg-transparent !text-black !font-black !p-0 !top-[-18px] !left-0">Tính tiền xe hơi</span>
        <div class="grid grid-cols-2 gap-10">
            <div class="flex gap-4">
                <div class="space-y-1">
                    <div class="f-row"><span class="f-label !w-12">Từ Giờ</span><input type="text" value="05:30:00" class="f-input center !w-20"></div>
                    <div class="f-row"><span class="f-label !w-12">Đến Giờ</span><input type="text" value="12:00:00" class="f-input center !w-20"></div>
                </div>
                <div class="f-row mt-auto mb-1"><span class="f-label !w-16 font-bold">Giá Tiền</span><input type="text" value="20000" class="f-input right !w-32 font-black"></div>
            </div>
            <div class="flex gap-4">
                <div class="space-y-1">
                    <div class="f-row"><span class="f-label !w-12">Từ Giờ</span><input type="text" value="12:00:00" class="f-input center !w-20"></div>
                    <div class="f-row"><span class="f-label !w-12">Đến Giờ</span><input type="text" value="23:59:59" class="f-input center !w-20"></div>
                </div>
                <div class="f-row mt-auto mb-1"><span class="f-label !w-16 font-bold">Giá Tiền</span><input type="text" value="30000" class="f-input right !w-32 font-black"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền vé tháng -->
    <div class="bg-purple-box p-2 mb-2 rounded-sm border">
        <label class="check-box mb-1 text-[10px] font-black"><input type="checkbox"><span>Tính tiền vé tháng(xe ra vào từ giờ A - đến giờ B : miễn phí. Qua khung giờ tính tiền. Qua 0 giờ tính đêm)</span></label>
        <div class="flex justify-between items-center px-2">
            <div class="flex gap-10">
                <div class="f-row"><span class="f-label !w-12">Từ Giờ</span><input type="text" value="09:18:11" class="f-input center !w-24 font-bold"></div>
                <div class="f-row"><span class="f-label !w-12">Đến Giờ</span><input type="text" value="09:18:11" class="f-input center !w-24 font-bold"></div>
            </div>
            <div class="f-row"><span class="f-label !w-20 text-right">Giá tiền</span><input type="text" class="f-input right !w-32"></div>
        </div>
        <div class="text-center text-red-600 font-black text-[11px] my-1 uppercase tracking-widest">A ————————————— MIỄN PHÍ ————————————— B</div>
        <div class="f-row justify-end"><span class="f-label !w-auto">Giá tiền qua đêm (tính từ 0 giờ )</span><input type="text" class="f-input right !w-32"></div>
    </div>

    <!-- Tính tiền theo ngày / Nhiều loại xe -->
    <div class="bg-grey-box p-2 mb-2 rounded-sm border">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center gap-2">
                <label class="check-box font-bold !mb-0"><input type="checkbox"><span>Tính tiền theo ngày</span></label>
                <div class="f-row ml-auto"><span class="f-label !w-16">Giá tiền</span><input type="text" class="f-input right !w-32"></div>
            </div>
            <label class="check-box font-bold !mb-0"><input type="checkbox"><span>Tính tiền nhiều loại vé ôtô</span></label>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-2 pt-2 border-t border-gray-400">
            <div>
                <label class="check-box text-[10px]"><input type="checkbox"><span>Tính tiền theo loại vé</span></label>
                <div class="f-row mt-1"><span class="f-label !w-16 text-blue-800">Số tiếng</span><input type="text" value="1" class="f-input center !w-12"><span class="text-[8px] italic ml-1">(Số tiếng=0 thì không tính...)</span></div>
                <div class="f-row mt-1"><span class="f-label !w-24 text-blue-800">Tiền qua đêm TG</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-24 text-blue-800">Tiền qua đêm XS</span><input type="text" class="f-input right flex-1"></div>
            </div>
            <div>
                <div class="f-row mt-6"><span class="f-label !w-20 text-blue-800">Tiền xe máy</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-20 text-blue-800">Tiền xe đạp</span><input type="text" class="f-input right flex-1"></div>
            </div>
            <div>
                <div class="f-row mt-1"><span class="f-label !w-24 text-blue-800">Số tiếng Xe hơi</span><input type="text" value="1" class="f-input center !w-12"></div>
                <div class="f-row mt-1"><span class="f-label !w-24 text-red-700 font-bold">Giá Hơi</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-24 text-red-700 font-bold">Giá vé tay ga</span><input type="text" class="f-input right flex-1"></div>
            </div>
        </div>
    </div>

    <!-- Tính tiền theo giờ (Bậc thang) -->
    <div class="bg-blue-box p-2 rounded-sm border">
        <label class="check-box mb-1 text-[10px] font-black"><input type="checkbox"><span>Tính tiền theo giờ. số giờ < (1) tính tiền 1, số giờ > (1) và số giờ < (2) tính tiền 2, số giờ > (2) và số giờ < (3) tính tiền 3</span></label>
        <div class="grid grid-cols-3 gap-2 mt-1">
            <div class="bg-white/50 p-2 border border-blue-400 relative">
                <span class="absolute right-1 top-0 font-black text-red-600">1</span>
                <div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe số</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe TG</span><input type="text" class="f-input right flex-1"></div>
            </div>
            <div class="bg-white/50 p-2 border border-blue-400 relative">
                <span class="absolute right-1 top-0 font-black text-red-600">2</span>
                <div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe số</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe TG</span><input type="text" class="f-input right flex-1"></div>
            </div>
            <div class="bg-white/50 p-2 border border-blue-400 relative">
                <span class="absolute right-1 top-0 font-black text-red-600">3</span>
                <div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe số</span><input type="text" class="f-input right flex-1"></div>
                <div class="f-row mt-1"><span class="f-label !w-24">Giá tiền xe TG</span><input type="text" class="f-input right flex-1"></div>
            </div>
        </div>
    </div>

    <!-- Action Bar (Match Layout) -->
    <div style="display: flex; justify-content: flex-end; gap: 8px; margin-top: 8px;">
        <button class="btn-action !px-8">Close</button>
        <button class="btn-action btn-blue !px-10 font-bold">Save</button>
    </div>
</div>
