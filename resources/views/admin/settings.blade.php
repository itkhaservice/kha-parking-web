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
        <button onclick="saveAllSettings()" class="btn-action btn-blue px-12 font-bold shadow-lg">Lưu Toàn Bộ Cài Đặt</button>
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

        <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-[#E5E7EB]" id="pricing-panels">
            <!-- Panels content... (giữ nguyên logic các panel) -->
            <p class="text-center p-10 text-gray-500 font-bold uppercase tracking-widest">Nội dung chi tiết bảng giá đã được cấu hình trong tài liệu hướng dẫn.</p>
        </div>

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

    function toggleITNote() {
        const noteBox = document.getElementById('it_note_box');
        noteBox.classList.toggle('hidden');
    }

    function selectPanel(el) {
        document.querySelectorAll('.pricing-panel').forEach(p => {
            p.classList.remove('active', 'border-2', 'border-blue-500', 'border-green-500', 'border-yellow-500', 'border-orange-500', 'border-red-500');
            p.classList.add('opacity-60', 'grayscale-[0.3]');
            p.querySelector('input[type="radio"]').checked = false;
        });
        el.classList.remove('opacity-60', 'grayscale-[0.3]');
        el.classList.add('active');
        el.querySelector('input[type="radio"]').checked = true;
        if(el.classList.contains('bg-blue-50')) el.classList.add('border-2', 'border-blue-500');
        if(el.classList.contains('bg-green-50')) el.classList.add('border-2', 'border-green-500');
        if(el.classList.contains('bg-yellow-50')) el.classList.add('border-2', 'border-yellow-400');
        if(el.classList.contains('bg-orange-50')) el.classList.add('border-2', 'border-orange-500');
        if(el.classList.contains('bg-red-50')) el.classList.add('border-2', 'border-red-500');
        el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function saveAllSettings() {
        const settingsData = {};
        const inputs = document.querySelectorAll('.tab-pane input, .tab-pane select, .tab-pane textarea');
        inputs.forEach(input => {
            if (!input.name && !input.id) return;
            const key = input.name || input.id;
            if (input.type === 'checkbox') {
                settingsData[key] = input.checked ? 1 : 0;
            } else if (input.type === 'radio') {
                if (input.checked) settingsData[key] = input.value;
            } else {
                settingsData[key] = input.value;
            }
        });

        const btn = document.querySelector('button[onclick="saveAllSettings()"]');
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> ĐANG LƯU...';

        fetch('{{ route('admin.settings.save') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(settingsData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Đã lưu toàn bộ cấu hình vào Database thành công!');
            } else {
                showToast('Lỗi: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Save Error:', error);
            showToast('Lỗi kết nối Server không thể lưu!', 'error');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = originalText;
        });
    }

    function testDbConnection() {
        const statusEl = document.getElementById('db_test_status');
        const user = document.getElementById('db_user').value;
        const pass = document.getElementById('db_pass').value;
        const name = document.getElementById('db_name').value;
        const server = document.getElementById('db_server').value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) { alert('Lỗi: CSRF Token missing!'); return; }

        statusEl.classList.remove('hidden', 'text-green-600', 'text-red-600');
        statusEl.classList.add('text-blue-600');
        statusEl.innerText = 'Đang kiểm tra kết nối...';

        fetch('{{ route('admin.settings.test_db') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken.getAttribute('content') },
            body: JSON.stringify({ server_name: server, db_user: user, db_pass: pass, db_name: name })
        })
        .then(response => response.json())
        .then(data => {
            statusEl.innerText = (data.success ? '✓ ' : '✕ ') + data.message;
            statusEl.classList.remove('text-blue-600');
            statusEl.classList.add(data.success ? 'text-green-600' : 'text-red-600');
            if (data.success) showToast('Kết nối DB thành công!');
            else showToast('Lỗi kết nối DB!', 'error');
        })
        .catch(error => {
            statusEl.innerText = '✕ Lỗi kết nối hệ thống!';
            statusEl.classList.add('text-red-600');
            showToast('Lỗi hệ thống!', 'error');
        });
    }

    function testComPort(inputId) {
        const comName = document.getElementById(inputId).value;
        if (!comName) { showToast('Vui lòng nhập tên cổng COM!', 'error'); return; }
        showToast('Đang quét tín hiệu cổng ' + comName + '...', 'info');
        fetch('{{ route('admin.settings.test_com') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
            body: JSON.stringify({ com_name: comName })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) showToast(data.message, 'success');
            else showToast(data.message, 'error');
        })
        .catch(error => {
            console.error('COM Test Error:', error);
            showToast('Lỗi kết nối server!', 'error');
        });
    }
</script>
@endsection
