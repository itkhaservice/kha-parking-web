@extends('layouts.admin')
@section('title', 'Cấu hình hệ thống vận hành')

@section('content')
<style>
    :root {
        --primary-brand: #108042;
        --bg-light: #F0F2F5;
        --panel-white: #FFFFFF;
        --border-color: #D1D5DB;
        --text-dark: #1F2937;
        --text-muted: #4B5563;
    }

    .settings-wrapper { height: calc(100vh - 100px); display: flex; flex-direction: column; padding: 8px; gap: 8px; overflow: hidden; background-color: var(--bg-light); }
    .tab-nav { display: flex; gap: 2px; border-bottom: 3px solid var(--primary-brand); flex-shrink: 0; }
    .tab-link { padding: 8px 15px; background: #E5E7EB; color: var(--text-muted); font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 2px 2px 0 0; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 6px; }
    .tab-link:hover { background: #D1D5DB; color: var(--text-dark); }
    .tab-link.active { background: var(--primary-brand); color: white; }

    .content-area { flex: 1; position: relative; background: var(--panel-white); border: 1px solid var(--border-color); box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 0; }
    .tab-pane { position: absolute; inset: 0; padding: 15px; overflow-y: auto; display: none; }
    .tab-pane.active { display: block; }

    /* SHARED STYLES FOR ALL TAB FILES */
    .tech-group { border: 1px solid var(--border-color); padding: 15px 12px 10px 12px; position: relative; margin-bottom: 12px; background: #F9FAFB; border-radius: 2px; }
    .group-label { position: absolute; top: -10px; left: 12px; background: var(--primary-brand); color: white; padding: 2px 10px; font-weight: 900; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; border-radius: 2px; }
    .f-row { display: flex; align-items: center; margin-bottom: 4px; gap: 8px; }
    .f-label { font-size: 12px; font-weight: 700; color: var(--text-dark); flex-shrink: 0; }
    .f-input { height: 24px; border: 1px solid var(--border-color); background: #FFF; padding: 0 8px; font-size: 12px; font-weight: 600; border-radius: 2px; outline: none; }
    .f-input:focus { border-color: var(--primary-brand); box-shadow: 0 0 0 2px rgba(16,128,66,0.1); }
    .f-input.mono { font-family: 'Consolas', monospace; font-size: 11px; }
    .f-input.center { text-align: center; }
    .f-input.right { text-align: right; }
    .check-box { display: flex; align-items: center; gap: 6px; cursor: pointer; margin-bottom: 2px; }
    .check-box input { width: 14px; height: 14px; accent-color: var(--primary-brand); flex-shrink: 0; }
    .check-text { font-size: 11px; font-weight: 700; color: #333; }
    .btn-action { height: 28px; padding: 0 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; border-radius: 2px; border: 1px solid var(--border-color); background: #FFF; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; }
    .btn-blue { background: var(--primary-brand); color: #FFF; border-color: var(--primary-brand); }
    .btn-danger { color: #DC2626; border-color: #FECACA; }
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .sub-box { border: 1px solid #E5E7EB; padding: 8px; background: #F9FAFB; border-radius: 2px; margin-bottom: 5px; }
    .win-table { width: 100%; border-collapse: collapse; font-size: 11px; border: 1px solid var(--border-color); }
    .win-table th { background: #F3F4F6; padding: 6px; text-align: left; font-weight: 900; border: 1px solid var(--border-color); color: var(--primary-blue); }
    .win-table td { padding: 4px 10px; border: 1px solid #E5E7EB; background: #FFF; }
    .win-table tr.active td { background: #EBF5FF; font-weight: bold; }

    /* PRICING COLORS */
    .bg-purple-box { background: #E2E2FF !important; border: 1px solid #A0A0FF; }
    .bg-grey-box { background: #D9D9D9 !important; border: 1px solid #A0A0A0; }
    .bg-blue-box { background: #C0C0FF !important; border: 1px solid #8080FF; }

    .hidden { display: none !important; }

    /* Modal */
    .guide-modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(2px); }
    .guide-window { background: white; width: 750px; max-height: 85vh; border-radius: 4px; display: flex; flex-direction: column; border-top: 4px solid var(--primary-brand); }
</style>

<div class="settings-wrapper">
    <div class="tab-nav">
        <div onclick="switchTab('system')" id="btn-system" class="tab-link active"><i class="fas fa-server"></i> 1. Hệ Thống</div>
        <div onclick="switchTab('hardware')" id="btn-hardware" class="tab-link"><i class="fas fa-video"></i> 2. Thiết bị</div>
        <div onclick="switchTab('cards')" id="btn-cards" class="tab-link"><i class="fas fa-id-card"></i> 3. Loại thẻ</div>
        <div onclick="switchTab('pricing')" id="btn-pricing" class="tab-link"><i class="fas fa-calculator"></i> 4. Giá tiền</div>
        <div onclick="switchTab('advanced')" id="btn-advanced" class="tab-link"><i class="fas fa-shield-alt"></i> 5. Nâng cao</div>
    </div>

    <div class="content-area">
        @include('admin.settings.system')
        @include('admin.settings.hardware')
        @include('admin.settings.cards')
        @include('admin.settings.pricing')
        @include('admin.settings.advanced')
    </div>

    <!-- GLOBAL FOOTER -->
    <div style="display: flex; justify-content: flex-end; gap: 10px; padding: 10px 15px; background: #E1E1E1; border-top: 1px solid #999; flex-shrink: 0;">
        <button onclick="window.location.href='{{ route('dashboard.guard') }}'" class="btn-action px-10 hover:bg-gray-200 transition-colors">Thoát</button>
        <button class="btn-action btn-blue px-12 font-bold">Lưu Toàn Bộ Cài Đặt</button>
    </div>
</div>

<!-- Modal Guide (Shared) -->
<div id="guideModal" class="guide-modal" onclick="if(event.target==this) toggleGuide()">
    <div class="guide-window !w-[850px]">
        <div class="bg-[#108042] text-white p-3 flex justify-between items-center font-bold shadow-md">
            <span class="flex items-center gap-2"><i class="fas fa-book"></i> CẤU HÌNH CHI TIẾT LOẠI BẢNG GIÁ</span>
            <button onclick="toggleGuide()" class="hover:text-red-200 transition-colors text-xl">✖</button>
        </div>
        
        <!-- Header Modal -->
        <div class="p-3 bg-gray-100 border-b border-gray-300 grid grid-cols-3 gap-4">
            <div>
                <label class="block text-[9px] font-black text-gray-500 uppercase mb-1">Tên bảng giá</label>
                <input type="text" value="Bảng giá xe máy" class="f-input !w-full font-bold border-gray-300">
            </div>
            <div>
                <label class="block text-[9px] font-black text-gray-500 uppercase mb-1">Loại xe</label>
                <select class="f-input !w-full font-bold border-gray-300">
                    <option>Xe máy</option>
                    <option>Xe hơi</option>
                    <option>Xe đạp</option>
                </select>
            </div>
            <div>
                <label class="block text-[9px] font-black text-gray-500 uppercase mb-1">Ghi chú</label>
                <input type="text" value="Áp dụng giữ xe vãng lai" class="f-input !w-full italic border-gray-300">
            </div>
        </div>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-[#E5E7EB]" id="pricing-panels">
            
            <!-- PANEL 1: CÁCH 1 -->
            <div class="pricing-panel active bg-blue-50 border-2 border-blue-500 p-4 rounded shadow-md relative transition-all" onclick="selectPanel(this)">
                <div class="flex items-center gap-3 mb-3 border-b border-blue-200 pb-2">
                    <input type="radio" name="pricing_method" checked class="w-5 h-5 accent-blue-600">
                    <span class="text-sm font-black text-blue-900 uppercase">CÁCH 1 – Khung 2 múi giờ theo Quyết định 32 TP.HCM</span>
                </div>
                <div class="panel-content grid grid-cols-2 gap-8 pl-8">
                    <div>
                        <span class="text-[10px] font-black text-blue-700 uppercase block mb-2 underline">A. Phương thức tính tiền</span>
                        <div class="space-y-1 bg-white/60 p-2 rounded border border-blue-100">
                            <label class="check-box text-[11px] font-bold"><input type="radio" name="p1_sub" checked><span>Theo Quyết định 32</span></label>
                            <label class="check-box text-[11px] font-bold"><input type="radio" name="p1_sub"><span>Tính theo lượt</span></label>
                            <label class="check-box text-[11px] font-bold"><input type="radio" name="p1_sub"><span>Tính block giờ (6 giờ)</span></label>
                            <label class="check-box text-[11px] font-bold"><input type="radio" name="p1_sub"><span>Gộp ngày đêm</span></label>
                            <label class="check-box text-[11px] font-bold"><input type="radio" name="p1_sub"><span>Tự động qua đêm</span></label>
                        </div>
                    </div>
                    <div>
                        <span class="text-[10px] font-black text-blue-700 uppercase block mb-2 underline">B. Cấu hình khung giờ</span>
                        <div class="space-y-2">
                            <div class="f-row justify-between"><span class="text-[11px] font-bold text-gray-600">Từ 05:00:00 → 21:00:00 :</span><input type="text" value="3000" class="f-input right !w-24 font-black text-blue-700 border-blue-200 bg-white"></div>
                            <div class="f-row justify-between"><span class="text-[11px] font-bold text-gray-600">Từ 21:00:00 → 23:59:59 :</span><input type="text" value="5000" class="f-input right !w-24 font-black text-blue-700 border-blue-200 bg-white"></div>
                            <div class="f-row justify-between pt-2 border-t border-blue-200"><span class="text-[11px] font-black uppercase text-red-600">Giá Qua Đêm :</span><input type="text" value="8000" class="f-input right !w-24 font-black text-red-600 border-red-200 bg-red-50"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANEL 2: CÁCH 2 -->
            <div class="pricing-panel opacity-60 grayscale-[0.3] bg-green-50 border border-green-300 p-4 rounded shadow hover:opacity-100 transition-all cursor-pointer" onclick="selectPanel(this)">
                <div class="flex items-center gap-3 mb-3 border-b border-green-200 pb-2">
                    <input type="radio" name="pricing_method" class="w-5 h-5 accent-green-600">
                    <span class="text-sm font-black text-green-900 uppercase">CÁCH 2 – 2 múi giờ cộng dồn theo khung</span>
                </div>
                <div class="panel-content grid grid-cols-2 gap-8 pl-8">
                    <div class="text-[11px] text-green-800 leading-relaxed font-medium bg-white/40 p-2 rounded">
                        <i class="fas fa-info-circle mr-1"></i> Tiền được cộng dồn theo từng khung giờ xe đi qua. <br>Ví dụ: Ở khung 1 rồi qua khung 2 sẽ tính tổng tiền 2 khung.
                    </div>
                    <div class="space-y-2">
                        <div class="f-row justify-between"><span class="text-[11px] font-bold">06:00 → 22:00 :</span><input type="text" value="3000" class="f-input right !w-24 font-bold border-green-200"></div>
                        <div class="f-row justify-between"><span class="text-[11px] font-bold">22:00 → 23:59 :</span><input type="text" value="5000" class="f-input right !w-24 font-bold border-green-200"></div>
                        <div class="f-row justify-between pt-1 border-t border-green-200"><span class="text-[11px] font-black text-red-600">PHÍ QUA ĐÊM :</span><input type="text" value="8000" class="f-input right !w-24 font-black text-red-600 border-red-200"></div>
                    </div>
                </div>
            </div>

            <!-- PANEL 3: CÁCH 3 -->
            <div class="pricing-panel opacity-60 grayscale-[0.3] bg-yellow-50 border border-yellow-400 p-4 rounded shadow hover:opacity-100 transition-all cursor-pointer" onclick="selectPanel(this)">
                <div class="flex items-center gap-3 mb-3 border-b border-yellow-200 pb-2">
                    <input type="radio" name="pricing_method" class="w-5 h-5 accent-yellow-600">
                    <span class="text-sm font-black text-yellow-900 uppercase">CÁCH 3 – 3 múi giờ (Ngày / Mức 2 / Qua đêm)</span>
                </div>
                <div class="panel-content grid grid-cols-2 gap-8 pl-8">
                    <div class="text-[11px] text-yellow-800 italic bg-white/40 p-2 rounded">Chia nhỏ ngày làm 3 mức giá khác nhau. Tiền cộng dồn theo từng múi giờ xe lưu bãi.</div>
                    <div class="space-y-1">
                        <div class="f-row justify-between"><span class="font-bold text-[10px] text-gray-600">06:00 → 19:00 :</span><input type="text" value="3000" class="f-input right !w-24 border-yellow-200"></div>
                        <div class="f-row justify-between"><span class="font-bold text-[10px] text-gray-600">19:00 → 22:59 :</span><input type="text" value="5000" class="f-input right !w-24 border-yellow-200"></div>
                        <div class="f-row justify-between"><span class="font-bold text-[10px] text-red-700">QUA ĐÊM :</span><input type="text" value="8000" class="f-input right !w-24 border-yellow-300"></div>
                    </div>
                </div>
            </div>

            <!-- PANEL 4: CÁCH 4 -->
            <div class="pricing-panel opacity-60 grayscale-[0.3] bg-orange-50 border border-orange-400 p-4 rounded shadow hover:opacity-100 transition-all cursor-pointer" onclick="selectPanel(this)">
                <div class="flex items-center gap-3 mb-2 border-b border-orange-200 pb-2">
                    <input type="radio" name="pricing_method" class="w-5 h-5 accent-orange-600">
                    <span class="text-sm font-black text-orange-900 uppercase">CÁCH 4 – 3 múi giờ + lệch múi giờ 2 tiếng</span>
                </div>
                <div class="panel-content pl-8 space-y-3">
                    <label class="check-box font-black text-orange-800"><input type="checkbox" checked class="accent-orange-600"><span>Áp dụng quy tắc lệch múi giờ 2 tiếng</span></label>
                    <div class="bg-white/50 p-2 rounded border border-orange-100">
                        <p class="text-[11px] text-orange-900 leading-tight font-medium">Quy tắc: Nếu tổng thời gian lưu bãi chưa vượt 2 giờ thì chưa chuyển sang mức giá của khung giờ mới.</p>
                        <p class="text-[10px] text-orange-700 italic mt-1">(Ví dụ: Vào 05:59 ra 06:01, nếu tổng thời gian < 2h vẫn tính theo giá khung trước đó).</p>
                    </div>
                </div>
            </div>

            <!-- PANEL 5: CÁCH 5 -->
            <div class="pricing-panel opacity-60 grayscale-[0.3] bg-red-50 border border-red-300 p-4 rounded shadow hover:opacity-100 transition-all cursor-pointer" onclick="selectPanel(this)">
                <div class="flex items-center gap-3 mb-2 border-b border-red-200 pb-2">
                    <input type="radio" name="pricing_method" class="w-5 h-5 accent-red-600">
                    <span class="text-sm font-black text-red-900 uppercase">CÁCH 5 – 2 múi giờ + quy tắc 9 giờ sáng</span>
                </div>
                <div class="panel-content pl-8">
                    <label class="check-box font-black text-red-800 mb-3"><input type="checkbox" checked class="accent-red-600"><span>Chỉ cộng dồn giá đêm khi xe ở lại vượt 09:00 sáng hôm sau</span></label>
                    <div class="grid grid-cols-2 gap-6 bg-white/40 p-3 rounded border border-red-100">
                        <div class="text-[10px] text-red-800 leading-tight border-l-4 border-red-300 pl-3">
                            Xe vào lúc 05:00 sáng: <br>
                            - Ra trước 09:00: Tính giá ngày (3000). <br>
                            - Ra sau 09:00: Tính gộp cả ngày + đêm (8000).
                        </div>
                        <div class="flex flex-col justify-center items-end">
                            <div class="f-row"><span class="font-black text-red-900 mr-2 text-[11px] uppercase">Gộp Ngày + Đêm:</span><input type="text" value="8000" class="f-input right !w-32 font-black text-red-600 border-red-300 bg-red-50 text-lg h-8"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Modal -->
        <div class="p-3 bg-gray-200 border-t border-gray-400 flex justify-end gap-3 shadow-[0_-2px_10px_rgba(0,0,0,0.1)]">
            <button onclick="toggleGuide()" class="btn-action px-10 border-gray-400 font-bold hover:bg-gray-300">HỦY BỎ</button>
            <button class="btn-action btn-blue px-12 font-black shadow-lg hover:brightness-110 active:scale-95 transition-all text-[12px]">LƯU CẤU HÌNH</button>
        </div>
    </div>
</div>

<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active'));
        document.getElementById('tab-' + tabId).classList.add('active');
        document.getElementById('btn-' + tabId).classList.add('active');
    }
    
    function toggleGuide() {
        const modal = document.getElementById('guideModal');
        modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
    }

    function selectPanel(el) {
        // Reset all panels
        document.querySelectorAll('.pricing-panel').forEach(p => {
            p.classList.remove('active', 'border-2', 'border-blue-500', 'border-green-500', 'border-yellow-500', 'border-orange-500', 'border-red-500');
            p.classList.add('opacity-60', 'grayscale-[0.3]');
            p.querySelector('input[type="radio"]').checked = false;
        });

        // Set active panel
        el.classList.remove('opacity-60', 'grayscale-[0.3]');
        el.classList.add('active');
        el.querySelector('input[type="radio"]').checked = true;

        // Apply specific active border
        if(el.classList.contains('bg-blue-50')) el.classList.add('border-2', 'border-blue-500');
        if(el.classList.contains('bg-green-50')) el.classList.add('border-2', 'border-green-500');
        if(el.classList.contains('bg-yellow-50')) el.classList.add('border-2', 'border-yellow-500');
        if(el.classList.contains('bg-orange-50')) el.classList.add('border-2', 'border-orange-500');
        if(el.classList.contains('bg-red-50')) el.classList.add('border-2', 'border-red-500');

        // Scroll into view
        el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
</script>
@endsection
