@extends('layouts.admin')
@section('title', 'Cấu hình hệ thống vận hành')

@section('content')
<style>
    :root {
        --primary-blue: #0B3D91;
        --bg-light: #F0F2F5;
        --panel-white: #FFFFFF;
        --border-color: #D1D5DB;
        --text-dark: #1F2937;
        --text-muted: #4B5563;
    }

    .settings-wrapper {
        height: calc(100vh - 100px);
        display: flex;
        flex-direction: column;
        padding: 10px;
        gap: 10px;
        overflow: hidden;
        background-color: var(--bg-light);
    }

    /* MODERN TAB BAR */
    .tab-nav { display: flex; gap: 2px; border-bottom: 3px solid var(--primary-blue); flex-shrink: 0; }
    .tab-link { padding: 10px 20px; background: #E5E7EB; color: var(--text-muted); font-size: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; border-radius: 4px 4px 0 0; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px; }
    .tab-link:hover { background: #D1D5DB; color: var(--text-dark); }
    .tab-link.active { background: var(--primary-blue); color: white; }

    /* CONTENT AREA */
    .content-area { flex: 1; position: relative; background: var(--panel-white); border: 1px solid var(--border-color); box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 0; }
    .tab-pane { position: absolute; inset: 0; padding: 20px; overflow-y: auto; display: none; }
    .tab-pane.active { display: block; }

    /* MODERN DASHBOARD STYLE (FOR TAB 1, 2, 3, 5) */
    .tech-group { border: 1px solid var(--border-color); padding: 18px 15px 12px 15px; position: relative; margin-bottom: 20px; background: #F9FAFB; border-radius: 4px; }
    .group-label { position: absolute; top: -10px; left: 15px; background: var(--primary-blue); color: white; padding: 2px 12px; font-weight: 900; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; border-radius: 2px; }
    .f-row { display: flex; align-items: center; margin-bottom: 6px; gap: 12px; }
    .f-label { width: 140px; font-size: 13px; font-weight: 700; color: var(--text-dark); flex-shrink: 0; }
    .input-dash { flex: 1; height: 30px; border: 1px solid var(--border-color); background: #FFF; padding: 0 12px; font-size: 13px; font-weight: 600; border-radius: 2px; transition: border-color 0.2s; }
    .input-dash:focus { border-color: var(--primary-blue); outline: none; box-shadow: 0 0 0 2px rgba(11,61,145,0.1); }
    .input-dash.mono { font-family: 'Consolas', monospace; font-size: 12px; background: #FDFDFD; }

    /* WINFORMS PRICING STYLE (FOR TAB 4 ONLY) */
    .pricing-pane .f-label { width: 110px; font-size: 11px; }
    .pricing-pane .f-input { height: 20px; border: 1px solid #7A7A7A; font-size: 11px; padding: 0 4px; }
    .pricing-pane .sub-box { border: 1px solid #AAA; padding: 10px; background: #F0F0F0; margin-bottom: 10px; position: relative; }
    .pricing-pane .box-title { font-size: 10px; font-weight: bold; margin-bottom: 5px; border-bottom: 1px solid #CCC; text-transform: uppercase; color: var(--primary-blue); }
    .pricing-pane .bg-purple { background: #E2E2FF; border: 1px solid #A0A0FF; }
    .pricing-pane .bg-grey { background: #D9D9D9; border: 1px solid #A0A0A0; }
    .pricing-pane .bg-blue { background: #C0C0FF; border: 1px solid #8080FF; }

    /* FOOTER */
    .action-footer { display: flex; justify-content: space-between; items-center; border-top: 1px solid var(--border-color); padding: 10px 15px; background: #E5E7EB; flex-shrink: 0; }
    .btn-win { height: 32px; padding: 0 20px; font-size: 11px; font-weight: 900; text-transform: uppercase; border-radius: 2px; border: 1px solid var(--border-color); background: #FFF; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; }
    .btn-win-blue { background: var(--primary-blue); color: #FFF; border-color: var(--primary-blue); }
</style>

<div class="settings-wrapper">
    <!-- NAVIGATION -->
    <div class="tab-nav">
        <div onclick="switchTab('system')" id="btn-system" class="tab-link active"><i class="fas fa-server"></i> 1. Hệ Thống</div>
        <div onclick="switchTab('hardware')" id="btn-hardware" class="tab-link"><i class="fas fa-video"></i> 2. Thiết bị & Camera</div>
        <div onclick="switchTab('cards')" id="btn-cards" class="tab-link"><i class="fas fa-id-card"></i> 3. Loại thẻ</div>
        <div onclick="switchTab('pricing')" id="btn-pricing" class="tab-link"><i class="fas fa-calculator"></i> 4. Giá tiền</div>
        <div onclick="switchTab('advanced')" id="btn-advanced" class="tab-link"><i class="fas fa-shield-alt"></i> 5. Nâng cao</div>
    </div>

    <div class="content-area">
        
        <!-- TAB 1: SYSTEM (MODERN STYLE) -->
        <div id="tab-system" class="tab-pane active">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <div class="tech-group">
                        <span class="group-label">Máy chủ & Kết nối</span>
                        <div class="f-row"><span class="f-label">Tên Server:</span><input type="text" value="DESKTOP-4P0F01E" class="input-dash mono font-bold"><label class="flex items-center gap-2 cursor-pointer ml-2"><input type="checkbox" checked class="w-4 h-4 accent-blue-900"><span class="text-[10px] font-black uppercase">Chạy</span></label></div>
                        <div class="f-row"><span class="f-label">Local / Cổng:</span><input type="text" value="127.0.0.1" class="input-dash mono"><input type="text" value="C0" class="input-dash !flex-none w-16 text-center"></div>
                        <div style="font-size: 10px; font-weight: 900; color: #999; margin: 15px 0 10px 0; border-bottom: 1px dashed #DDD; padding-bottom: 2px;">KẾT NỐI CƠ SỞ DỮ LIỆU SQL</div>
                        <div class="f-row"><span class="f-label">Tài khoản (sa):</span><input type="text" value="sa" class="input-dash"></div>
                        <div class="f-row"><span class="f-label">Mật khẩu:</span><input type="password" value="******" class="input-dash"></div>
                        <div class="f-row"><span class="f-label">Tên Database:</span><input type="text" value="baixe" class="input-dash font-bold text-blue-700"></div>
                    </div>
                </div>
                <div class="tech-group">
                    <span class="group-label">Vận hành & Lưu trữ</span>
                    <div class="f-row"><span class="f-label">Đường dẫn Hình:</span><input type="text" value="D:\hinh1" class="input-dash mono"></div>
                    <div class="f-row"><span class="f-label">URL Server:</span><input type="text" value="http://117.4.91.45:85/hinh" class="input-dash mono"></div>
                    <div class="grid grid-cols-1 gap-1 mt-4">
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" checked class="w-4 h-4 accent-blue-900"><span class="text-xs font-bold text-gray-700 uppercase">Tăng tốc độ xử lý khi quẹt thẻ</span></label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" checked class="w-4 h-4 accent-blue-900"><span class="text-xs font-bold text-gray-700 uppercase">Tự động kết nối khi có server</span></label>
                        <label class="flex items-center gap-3 cursor-pointer"><input type="checkbox" checked class="w-4 h-4 accent-blue-900"><span class="text-xs font-bold text-gray-700 uppercase">Phát âm thanh thông báo hệ thống</span></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 2: HARDWARE (MODERN STYLE) -->
        <div id="tab-hardware" class="tab-pane">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="tech-group">
                    <span class="group-label">Cấu hình Làn & Camera</span>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div style="border: 1px solid #E5E7EB; padding: 10px; background: #FFF;">
                            <div style="font-size: 10px; font-weight: 900; color: #1D4ED8; margin-bottom: 8px; border-bottom: 1px solid #F3F4F6;">LÀN VÀO</div>
                            <div class="f-row"><span class="f-label !w-20">Cam xe:</span><input type="text" value="3" class="input-dash text-center"></div>
                            <div class="f-row"><span class="f-label !w-20">Cam mặt:</span><input type="text" value="0" class="input-dash text-center"></div>
                        </div>
                        <div style="border: 1px solid #E5E7EB; padding: 10px; background: #FFF;">
                            <div style="font-size: 10px; font-weight: 900; color: #EA580C; margin-bottom: 8px; border-bottom: 1px solid #F3F4F6;">LÀN RA</div>
                            <div class="f-row"><span class="f-label !w-20">Cam xe:</span><input type="text" value="2" class="input-dash text-center"></div>
                            <div class="f-row"><span class="f-label !w-20">Cam mặt:</span><input type="text" value="1" class="input-dash text-center"></div>
                        </div>
                    </div>
                    <div style="font-size: 10px; font-weight: 900; color: #999; margin-top: 15px; margin-bottom: 8px;">THAM SỐ NHẬN DIỆN AI (MS)</div>
                    <div class="flex gap-4">
                        <div class="f-row flex-1"><span class="f-label !w-12">Vào:</span><input type="text" value="1000" class="input-dash text-center font-bold"></div>
                        <div class="f-row flex-1"><span class="f-label !w-12">Ra:</span><input type="text" value="1000" class="input-dash text-center font-bold"></div>
                        <div class="f-row flex-1"><span class="f-label !w-12">Hậu:</span><input type="text" value="100" class="input-dash text-center"></div>
                    </div>
                </div>
                <div class="tech-group">
                    <span class="group-label">Đầu ghi & COM Port</span>
                    <div class="f-row"><span class="f-label">Địa chỉ IP:</span><input type="text" value="192.168.1.250" class="input-dash mono"></div>
                    <div class="f-row"><span class="f-label">Tài khoản:</span><input type="text" value="admin" class="input-dash"></div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 15px;">
                        <div style="border: 1px dashed #CCC; padding: 8px;">
                            <div style="font-size: 9px; font-weight: 900; color: #1D4ED8; margin-bottom: 5px;">COM VÀO</div>
                            <div class="f-row"><span class="f-label !w-10">Cổng:</span><input type="text" value="5" class="input-dash text-center"></div>
                        </div>
                        <div style="border: 1px dashed #CCC; padding: 8px;">
                            <div style="font-size: 9px; font-weight: 900; color: #EA580C; margin-bottom: 5px;">COM RA</div>
                            <div class="f-row"><span class="f-label !w-10">Cổng:</span><input type="text" value="8" class="input-dash text-center"></div>
                        </div>
                    </div>
                    <button class="btn-action w-full mt-4 bg-gray-50"><i class="fas fa-search-plus"></i> CHỈNH ZOOM CAMERA</button>
                </div>
            </div>
        </div>

        <!-- TAB 3: CARDS (MODERN STYLE) -->
        <div id="tab-cards" class="tab-pane">
            <div class="tech-group">
                <span class="group-label">Danh mục Loại thẻ</span>
                <div style="height: 200px; border: 1px solid var(--border-color); background: #FFF; overflow-y: auto; margin-bottom: 15px; border-radius: 4px;">
                    <table class="win-table">
                        <thead><tr><th>Mã Thẻ</th><th>Tên Loại Thẻ</th><th class="text-center">Tính Tiền</th></tr></thead>
                        <tbody><tr class="active"><td>VT</td><td>Vé tháng cư dân</td><td class="text-center">0</td></tr><tr><td>VT-XD</td><td>Vé tháng xe đạp</td><td class="text-center">0</td></tr></tbody>
                    </table>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="f-row"><span class="f-label">Mã loại:</span><input type="text" class="input-dash font-bold"></div>
                    <div class="f-row"><span class="f-label">Diễn giải:</span><input type="text" class="input-dash"></div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <label class="check-box"><input type="checkbox" class="w-4 h-4 accent-blue-900"><span class="text-xs font-bold text-gray-600 uppercase">Tính tiền vượt quy định</span></label>
                    <div class="flex gap-2"><button class="btn-action"><i class="fas fa-plus"></i> Thêm</button><button class="btn-action"><i class="fas fa-edit"></i> Sửa</button><button class="btn-action btn-danger"><i class="fas fa-trash"></i> Xóa</button></div>
                </div>
            </div>
        </div>

        <!-- TAB 4: PRICING (WINFORMS STYLE - EXACT MATCH IMAGE) -->
        <div id="tab-pricing" class="tab-pane pricing-pane">
            <div class="pricing-header-row">
                <div class="flex items-center gap-4 text-[11px] font-black">
                    <label class="flex items-center gap-1"><input type="checkbox" checked class="win-check">PP1 :</label>
                    <label class="flex items-center gap-1 text-red-600"><input type="radio" name="pp" checked class="win-check">Loại 1(Qđ 35)</label>
                    <label class="flex items-center gap-1"><input type="radio" name="pp" class="win-check">Loại 2(2 múi giờ)</label>
                    <label class="flex items-center gap-1"><input type="radio" name="pp" class="win-check">Loại 3(3H múi giờ)</label>
                    <label class="flex items-center gap-1"><input type="radio" name="pp" class="win-check">Loại 4(LT-AL)</label>
                    <label class="flex items-center gap-1"><input type="radio" name="pp" class="win-check">Loại 5(Q35 Nhóm 2)</label>
                </div>
                <button onclick="toggleGuide()" class="text-red-700 italic underline text-[10px] cursor-pointer">Xem chi tiết loại bảng giá</button>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; border: 1px solid #AAA; padding: 10px; background: #F0F0F0; margin-bottom: 10px;">
                <div>
                    <div class="f-row"><span class="f-label !w-16">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center !w-24"></div>
                    <div class="f-row"><span class="f-label !w-16">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center !w-24"></div>
                    <label class="flex items-center mt-2 font-bold"><input type="checkbox" checked class="win-check">Thời gian miễn phí</label>
                    <div class="f-row ml-4"><input type="text" value="300" class="f-input center !w-16"><span style="font-size: 9px; color:#666;" class="italic ml-1">(giây)</span></div>
                </div>
                <div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền XS</span><input type="text" value="5000" class="f-input right !w-20 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền TG</span><input type="text" value="5000" class="f-input right !w-20 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right !w-20"></div>
                </div>
                <div style="border-left: 1px solid #CCC; padding-left: 10px;">
                    <div class="f-row"><span class="f-label !w-24">1 Ngày XS</span><input type="text" value="15000" class="f-input right !w-20 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">1 Ngày TG</span><input type="text" value="15000" class="f-input right !w-20 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">1 Ngày XĐ</span><input type="text" value="0" class="f-input right !w-20"></div>
                </div>
            </div>

            <div class="sub-box"><div class="box-title">Tính tiền xe hơi</div>
                <div class="grid-2">
                    <div class="flex gap-4"><div><div class="f-row"><span class="f-label !w-12">Từ</span><input type="text" value="05:30:00" class="f-input center"></div><div class="f-row"><span class="f-label !w-12">Đến</span><input type="text" value="12:00:00" class="f-input center"></div></div><div class="f-row"><span class="f-label !w-12 font-bold">Giá</span><input type="text" value="20000" class="f-input right font-bold text-blue-800"></div></div>
                    <div class="flex gap-4"><div><div class="f-row"><span class="f-label !w-12">Từ</span><input type="text" value="12:00:00" class="f-input center"></div><div class="f-row"><span class="f-label !w-12">Đến</span><input type="text" value="23:59:59" class="f-input center"></div></div><div class="f-row"><span class="f-label !w-12 font-bold">Giá</span><input type="text" value="30000" class="f-input right font-bold text-blue-800"></div></div>
                </div>
            </div>

            <div class="sub-box bg-purple">
                <label class="flex items-center mb-1"><input type="checkbox" class="win-check"><span>Tính tiền vé tháng (A → B miễn phí...)</span></label>
                <div class="flex justify-between items-center"><div class="flex gap-4"><div class="f-row"><span class="f-label !w-12">Từ</span><input type="text" value="09:18:11" class="f-input center"></div><div class="f-row"><span class="f-label !w-12">Đến</span><input type="text" value="09:18:11" class="f-input center"></div></div><div class="f-row"><span class="f-label">Giá tiền</span><input type="text" class="f-input right !w-32"></div></div>
                <div style="font-size: 11px; font-weight: bold; color: red; text-align: center; margin: 5px 0;">A —————————— MIỄN PHÍ —————————— B</div>
            </div>

            <div class="sub-box bg-grey">
                <div class="f-row mb-2"><label class="flex items-center"><input type="checkbox" class="win-check"><span>Tính tiền theo ngày</span></label><input type="text" class="f-input right !w-24 ml-2"><label class="ml-auto flex items-center"><input type="checkbox" class="win-check"><span>Tính tiền nhiều loại vé ô tô</span></label></div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                    <div><label class="flex items-center mb-1"><input type="checkbox" class="win-check">Loại vé</label><div class="f-row"><span class="f-label">Số tiếng</span><input type="text" value="1" class="f-input center !w-12"></div><div class="f-row"><span class="f-label text-blue-800">Đêm TG</span><input type="text" class="f-input right"></div></div>
                    <div><div class="f-row mt-5"><span class="f-label !w-24">Tiếng Xe hơi</span><input type="text" value="1" class="f-input center !w-12"></div><div class="f-row"><span class="f-label text-blue-800">Xe máy</span><input type="text" class="f-input right"></div></div>
                    <div><div class="f-row mt-5"><span class="f-label text-blue-800">Giá Hơi</span><input type="text" class="f-input right font-bold"></div><div class="f-row"><span class="f-label text-red-700">Tay ga</span><input type="text" class="f-input right font-bold"></div></div>
                </div>
            </div>

            <div class="sub-box bg-blue">
                <div style="font-size: 10px; font-weight: bold; margin-bottom: 5px;">TÍNH TIỀN THEO GIỜ (BẬC THANG)</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px;">
                    <div class="bg-white/50 p-1 border">Mức 1 (>= <input type="text" class="w-8 center"> h)<div class="f-row mt-1">Giá XS<input type="text" class="f-input right"></div><div class="f-row">Giá TG<input type="text" class="f-input right"></div></div>
                    <div class="bg-white/50 p-1 border">Mức 2 (>= <input type="text" class="w-8 center"> h)<div class="f-row mt-1">Giá XS<input type="text" class="f-input right"></div><div class="f-row">Giá TG<input type="text" class="f-input right"></div></div>
                    <div class="bg-white/50 p-1 border">Mức 3 (>= <input type="text" class="w-8 center"> h)<div class="f-row mt-1">Giá XS<input type="text" class="f-input right"></div><div class="f-row">Giá TG<input type="text" class="f-input right"></div></div>
                </div>
            </div>
        </div>

        <!-- TAB 5: ADVANCED -->
        <div id="tab-advanced" class="tab-pane"><div class="p-20 text-center text-gray-400 font-bold uppercase italic">Mô đun nâng cao đang cập nhật...</div></div>
    </div>

    <!-- ACTION FOOTER -->
    <div class="action-footer">
        <div class="flex gap-2">
            <button class="btn-win shadow-sm"><i class="fas fa-eraser"></i> XÓA USB</button>
            <button class="btn-win shadow-sm"><i class="fas fa-file-export"></i> XUẤT DỮ LIỆU</button>
        </div>
        <div class="flex gap-3">
            <a href="/dashboard/guard" class="btn-win btn-danger font-bold"><i class="fas fa-power-off"></i> THOÁT (CLOSE)</a>
            <button class="btn-win btn-win-blue font-bold px-12"><i class="fas fa-save"></i> LƯU THAY ĐỔI (SAVE)</button>
        </div>
    </div>
</div>

<!-- GUIDE MODAL -->
<div id="guideModal" class="guide-modal" onclick="if(event.target==this) toggleGuide()">
    <div class="guide-window">
        <div class="bg-[#0B3D91] text-white p-3 flex justify-between items-center font-bold"><span>HƯỚNG DẪN CẤU HÌNH LOẠI BẢNG GIÁ</span><button onclick="toggleGuide()">✖</button></div>
        <div class="p-4 overflow-y-auto max-h-[450px] space-y-4 text-xs">
            <div class="bg-blue-50 p-3 border-l-4 border-blue-600"><p class="font-black text-blue-900 uppercase">Loại 1: Khung 2 múi giờ (QĐ 32)</p><p>5h-21h (Ngày) và 21h-5h (Đêm). Đặt Từ 5:00:00 -> 21:00:00.</p></div>
            <div class="bg-purple-50 p-3 border-l-4 border-purple-600"><p class="font-black text-purple-900 uppercase">Loại 5: Vượt 9h sáng mới tính cộng dồn giá đêm.</p></div>
        </div>
        <div class="p-3 bg-[#F3F4F6] border-t text-right"><button onclick="toggleGuide()" class="btn-win px-10 btn-win-blue">ĐÃ HIỂU</button></div>
    </div>
</div>

<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active'));
        document.getElementById('tab-' + tabId).classList.add('active');
        document.getElementById('btn-' + tabId).classList.add('active');
        const titles = { system: 'Hệ Thống', hardware: 'Thiết bị & Camera', cards: 'Loại thẻ', pricing: 'Cấu hình Giá tiền', advanced: 'Nâng cao' };
        document.getElementById('tab-title').innerText = 'Cấu hình ' + titles[tabId];
    }
    function toggleGuide() {
        const modal = document.getElementById('guideModal');
        modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
    }
</script>
@endsection
