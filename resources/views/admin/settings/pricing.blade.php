<div id="tab-pricing" class="tab-pane">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #999; padding-bottom: 5px; margin-bottom: 10px;">
        <div style="display: flex; gap: 15px; font-weight: bold; font-size: 11px;">
            <label class="flex items-center gap-1"><input type="checkbox" checked class="win-check"> PP1 :</label>
            <label class="flex items-center gap-1 text-red-600"><input type="radio" name="pp" checked> Loại 1(Qđ 35)</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 2</label>
            <label class="flex items-center gap-1"><input type="radio" name="pp"> Loại 3</label>
        </div>
        <button onclick="toggleGuide()" class="text-red-700 italic underline text-[10px] cursor-pointer">Xem chi tiết loại bảng giá</button>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr 1.2fr; gap: 10px; background: #F0F0F0; border: 1px solid #999; padding: 10px; margin-bottom: 10px;">
        <div>
            <div class="f-row"><span class="f-label !w-16">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center flex-1"></div>
            <div class="f-row"><span class="f-label !w-16">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center flex-1"></div>
            <label class="check-box mt-3 font-bold"><input type="checkbox" checked><span>Thời gian miễn phí (s):</span><input type="text" value="300" class="f-input center !w-16 ml-2"></label>
        </div>
        <div>
            <div class="f-row"><span class="f-label !w-24">Giá Tiền XS</span><input type="text" value="5000" class="f-input right font-bold flex-1"></div>
            <div class="f-row"><span class="f-label !w-24">Giá Tiền TG</span><input type="text" value="5000" class="f-input right font-bold flex-1"></div>
            <div class="f-row"><span class="f-label !w-24 text-gray-400">Giá XĐ</span><input type="text" value="0" class="f-input right flex-1"></div>
        </div>
        <div style="border-left: 1px solid #CCC; padding-left: 10px;">
            <div class="f-row"><span class="f-label !w-24">1 Ngày XS</span><input type="text" value="15000" class="f-input right font-bold flex-1"></div>
            <div class="f-row"><span class="f-label !w-24">1 Ngày TG</span><input type="text" value="15000" class="f-input right font-bold flex-1"></div>
        </div>
    </div>
    <div class="bg-purple-box p-3 mb-2 rounded-sm border">
        <label class="check-box mb-2 uppercase text-[10px] font-black"><input type="checkbox"><span>Tính tiền vé tháng (A → B MIỄN PHÍ)</span></label>
        <div class="flex justify-between items-center"><div class="flex gap-4"><input type="text" value="09:18:11" class="f-input center !w-24"><input type="text" value="09:18:11" class="f-input center !w-24"></div><div class="f-row"><span class="f-label">Giá tiền:</span><input type="text" class="f-input right !w-24"></div></div>
        <div class="text-center text-red-600 font-black text-[11px] my-2 uppercase tracking-widest">A ————————————— MIỄN PHÍ ————————————— B</div>
        <div class="f-row justify-end"><span class="f-label !w-auto">Giá qua đêm (tính từ 0 giờ):</span><input type="text" value="0" class="f-input right !w-32 font-bold text-red-600"></div>
    </div>
    <div class="bg-grey-box p-3 mb-2 rounded-sm grid grid-cols-2 gap-4 border">
        <div><label class="check-box mb-2"><input type="checkbox"><span>Tính tiền theo ngày</span></label><div class="f-row"><span class="f-label">Giá tiền:</span><input type="text" value="15000" class="f-input right flex-1"></div></div>
        <div><label class="check-box mb-2"><input type="checkbox"><span>Tính tiền nhiều loại vé ô tô</span></label><div class="f-row"><span class="f-label text-blue-800">Giá Hơi:</span><input type="text" class="f-input right flex-1 font-black"></div></div>
    </div>
    <div class="bg-blue-box p-3 rounded-sm border">
        <div class="text-[10px] font-black mb-2 uppercase italic">Tính tiền theo giờ (Bậc thang)</div>
        <div class="grid grid-cols-3 gap-2">
            <div class="bg-white/50 p-2 border"><div class="f-row"><span class="f-label !w-16">>= 1 h</span><input type="text" class="f-input center !w-12"><span class="ml-auto font-black text-red-600">1</span></div><div class="f-row mt-1">Giá XS<input type="text" class="f-input right flex-1"></div></div>
            <div class="bg-white/50 p-2 border"><div class="f-row"><span class="f-label !w-16">>= 2 h</span><input type="text" class="f-input center !w-12"><span class="ml-auto font-black text-red-600">2</span></div><div class="f-row mt-1">Giá XS<input type="text" class="f-input right flex-1"></div></div>
            <div class="bg-white/50 p-2 border"><div class="f-row"><span class="f-label !w-16">>= 3 h</span><input type="text" class="f-input center !w-12"><span class="ml-auto font-black text-red-600">3</span></div><div class="f-row mt-1">Giá XS<input type="text" class="f-input right flex-1"></div></div>
        </div>
    </div>
</div>
