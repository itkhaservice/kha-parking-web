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
        <button class="btn-action px-10">Thoát</button>
        <button class="btn-action btn-blue px-12 font-bold">Lưu Toàn Bộ Cài Đặt</button>
    </div>
</div>

<!-- Modal Guide (Shared) -->
<div id="guideModal" class="guide-modal" onclick="if(event.target==this) toggleGuide()">
    <div class="guide-window">
        <div class="bg-[#108042] text-white p-3 flex justify-between items-center font-bold"><span>HƯỚNG DẪN CẤU HÌNH LOẠI BẢNG GIÁ</span><button onclick="toggleGuide()">✖</button></div>
        <div class="p-4 overflow-y-auto max-h-[450px] space-y-4 text-xs">
            <div class="bg-blue-50 p-3 border-l-4 border-blue-600"><p class="font-black text-blue-900 uppercase">Loại 1 (QĐ 32)</p><p>5h-21h Ngày, 21h-5h Đêm. Đặt Từ 5:00:00 -> 21:00:00. Giá XS: 3000, TG: 5000, Qua đêm: 8000.</p></div>
            <div class="bg-purple-50 p-3 border-l-4 border-purple-600"><p class="font-black text-purple-900 uppercase">Loại 5: Vượt 9h sáng mới cộng dồn giá đêm.</p></div>
        </div>
        <div class="p-3 bg-[#F3F4F6] border-t text-right"><button onclick="toggleGuide()" class="btn-action px-10 btn-blue">ĐÃ HIỂU</button></div>
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
</script>
@endsection
