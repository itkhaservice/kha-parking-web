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

    .settings-wrapper { height: calc(100vh - 100px); display: flex; flex-direction: column; padding: 10px; gap: 10px; overflow: hidden; background-color: var(--bg-light); }
    .tab-nav { display: flex; gap: 2px; border-bottom: 3px solid var(--primary-blue); flex-shrink: 0; }
    .tab-link { padding: 8px 15px; background: #E5E7EB; color: var(--text-muted); font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 2px 2px 0 0; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 6px; }
    .tab-link:hover { background: #D1D5DB; color: var(--text-dark); }
    .tab-link.active { background: var(--primary-blue); color: white; }
    .content-area { flex: 1; position: relative; background: var(--panel-white); border: 1px solid var(--border-color); box-shadow: 0 1px 3px rgba(0,0,0,0.05); min-height: 0; }
    .tab-pane { position: absolute; inset: 0; padding: 15px; overflow-y: auto; display: none; }
    .tab-pane.active { display: block; }
    
    .tech-group { border: 1px solid var(--border-color); padding: 15px 12px 10px 12px; position: relative; margin-bottom: 15px; background: #F9FAFB; border-radius: 2px; }
    .group-label { position: absolute; top: -10px; left: 12px; background: var(--primary-blue); color: white; padding: 2px 10px; font-weight: 900; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; border-radius: 2px; }
    .f-row { display: flex; align-items: center; margin-bottom: 4px; gap: 8px; }
    .f-label { font-size: 11px; font-weight: 700; color: var(--text-dark); flex-shrink: 0; }
    .f-input { height: 22px; border: 1px solid var(--border-color); background: #FFF; padding: 0 6px; font-size: 11px; font-weight: 600; border-radius: 2px; transition: all 0.2s; }
    .f-input:focus { border-color: var(--primary-blue); outline: none; }
    .f-input.center { text-align: center; }
    
    .check-box { display: flex; align-items: center; gap: 6px; cursor: pointer; margin-bottom: 2px; }
    .check-box input { width: 13px; height: 13px; accent-color: var(--primary-blue); flex-shrink: 0; }
    .check-text { font-size: 11px; color: var(--text-dark); }
    
    .btn-action { height: 28px; padding: 0 12px; font-size: 10px; font-weight: 900; text-transform: uppercase; border-radius: 2px; border: 1px solid var(--border-color); background: #FFF; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; }
    .btn-blue { background: var(--primary-blue); color: #FFF; border-color: var(--primary-blue); }
    .btn-danger { color: #DC2626; border-color: #FECACA; }
    
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .sub-box { border: 1px solid #E5E7EB; padding: 8px; background: #F9FAFB; border-radius: 2px; margin-bottom: 5px; }
    .hidden { display: none !important; }
    
    /* Pricing Specific */
    .pricing-header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; border-bottom: 1px solid #AAA; padding-bottom: 4px; }
    .p-matrix { display: grid; grid-template-columns: 1.2fr 1fr 1fr; gap: 10px; background: #F0F0F0; border: 1px solid #999; padding: 10px; margin-bottom: 10px; }
    .p-purple { background: #E2E2FF; border: 1px solid #A0A0FF; padding: 8px; margin-bottom: 8px; }
    .p-grey { background: #D9D9D9; border: 1px solid #A0A0A0; padding: 8px; margin-bottom: 8px; }
    .p-blue { background: #C0C0FF; border: 1px solid #8080FF; padding: 8px; }
    .win-table { width: 100%; border-collapse: collapse; font-size: 11px; border: 1px solid var(--border-color); }
    .win-table th { background: #F3F4F6; padding: 4px 8px; text-align: left; font-weight: 900; border: 1px solid var(--border-color); color: var(--primary-blue); }
    .win-table td { padding: 3px 8px; border: 1px solid #E5E7EB; background: #FFF; }
    
    /* Guide Modal */
    .guide-modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(2px); }
    .guide-window { background: white; width: 700px; max-height: 85vh; border-radius: 4px; display: flex; flex-direction: column; border-top: 4px solid var(--primary-blue); }
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
        <!-- TAB 1: SYSTEM -->
        <div id="tab-system" class="tab-pane active">
            <div class="grid-2">
                <div>
                    <div class="tech-group">
                        <span class="group-label">Máy chủ & Server</span>
                        <div class="f-row"><span class="f-label">Server Name:</span><input type="text" value="DESKTOP-4P0F01E" class="f-input font-bold"><label class="check-box ml-2"><input type="checkbox" checked><span class="text-[10px] font-black uppercase">Chạy</span></label></div>
                        <div class="f-row"><span class="f-label">Server Local:</span><input type="text" value="DESKTOP-4P0F01E" class="f-input"><span class="f-label !w-10 ml-2">Cổng:</span><input type="text" value="C0" class="f-input !flex-none w-12 text-center"></div>
                        <div style="font-size: 10px; font-weight: 900; color: #999; margin: 15px 0 5px 0; border-bottom: 1px dashed #DDD;">KẾT NỐI DATABASE</div>
                        <div class="f-row"><span class="f-label">UserName:</span><input type="text" value="sa" class="f-input"></div>
                        <div class="f-row"><span class="f-label">Password:</span><input type="password" value="******" class="f-input"></div>
                        <div class="f-row"><span class="f-label">Database:</span><input type="text" value="baixe" class="f-input font-bold text-blue-700"></div>
                    </div>
                    <div class="tech-group">
                        <span class="group-label">Đường dẫn Hình ảnh</span>
                        <div class="f-row"><span class="f-label">Local Path:</span><input type="text" value="D:\hinh1" class="f-input"></div>
                        <div class="f-row"><span class="f-label">URL Server:</span><input type="text" value="http://117.4.91.45:85/hinh" class="f-input text-blue-600 underline"></div>
                        <div class="f-row"><span class="f-label">Backup:</span><input type="text" value="D:\ITS_BK" class="f-input"></div>
                    </div>
                </div>
                <div class="tech-group">
                    <span class="group-label">Tùy chọn Vận hành</span>
                    <div class="grid grid-cols-1 gap-1">
                        <label class="check-box"><input type="checkbox" checked><span class="check-text">Tăng tốc độ xử lý khi quẹt thẻ</span></label>
                        <label class="check-box"><input type="checkbox"><span class="check-text">Đồng bộ dữ liệu (2 máy trở lên)</span></label>
                        <label class="check-box"><input type="checkbox" checked><span class="check-text">Tự động kết nối khi có server</span></label>
                        <label class="check-box"><input type="checkbox"><span class="check-text">In vé xe hơi XH</span></label>
                        <label class="check-box"><input type="checkbox"><span class="check-text">Hình Online (DDNS)</span></label>
                        <label class="check-box"><input type="checkbox" checked><span class="check-text">Hiển thị doanh thu khi ra ca</span></label>
                        <label class="check-box"><input type="checkbox" checked><span class="check-text">Đọc Giá Tiền</span></label>
                        <label class="check-box"><input type="checkbox" checked><span class="check-text">Phát âm thanh</span></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 2: HARDWARE -->
        <div id="tab-hardware" class="tab-pane">
            <div class="grid-2">
                <div>
                    <div class="tech-group">
                        <span class="group-label">Camera & Làn bãi</span>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="sub-box border-l-4 border-blue-900">
                                <div class="text-[10px] font-black text-blue-900 mb-2 uppercase">Làn Vào</div>
                                <div class="f-row"><span class="f-label !w-20">Cam Xe:</span><input type="text" value="3" class="f-input center"></div>
                                <div class="f-row"><span class="f-label !w-20">Cam Mặt:</span><input type="text" value="0" class="f-input center"></div>
                            </div>
                            <div class="sub-box border-l-4 border-orange-600">
                                <div class="text-[10px] font-black text-orange-900 mb-2 uppercase">Làn Ra</div>
                                <div class="f-row"><span class="f-label !w-20">Cam Xe:</span><input type="text" value="2" class="f-input center"></div>
                                <div class="f-row"><span class="f-label !w-20">Cam Mặt:</span><input type="text" value="1" class="f-input center"></div>
                            </div>
                        </div>
                        <div class="f-row mt-4 gap-4">
                            <div class="f-row"><span class="f-label !w-auto">Vào(ms):</span><input type="text" value="1000" class="f-input !w-12 center"></div>
                            <div class="f-row"><span class="f-label !w-auto">Ra(ms):</span><input type="text" value="1000" class="f-input !w-12 center"></div>
                            <div class="f-row"><span class="f-label !w-auto">Hậu(ms):</span><input type="text" value="100" class="f-input !w-12 center"></div>
                        </div>
                    </div>
                </div>
                <div class="tech-group">
                    <span class="group-label">Đầu ghi & COM</span>
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        <div class="f-row"><span class="f-label !w-12">IP:</span><input type="text" value="192.168.1.250" class="f-input"></div>
                        <div class="f-row"><span class="f-label !w-12 text-right">Port:</span><input type="text" value="37777" class="f-input"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="f-row"><span class="f-label !w-12">User:</span><input type="text" value="admin" class="f-input"></div>
                        <div class="f-row"><span class="f-label !w-12 text-right">Pass:</span><input type="password" value="******" class="f-input"></div>
                    </div>
                    <label class="check-box mt-2"><input type="checkbox" checked><span class="text-xs font-bold text-blue-800">Hình ảnh HD</span></label>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div class="sub-box"><div class="text-[9px] font-bold mb-1">COM VÀO</div><div class="f-row"><span class="f-label !w-10">Port:</span><input type="text" value="5" class="f-input center"></div><div class="f-row"><span class="f-label !w-10">Baud:</span><input type="text" value="19200" class="f-input center"></div><label class="check-box"><input type="checkbox"><span class="text-[10px]">UHF</span></label></div>
                        <div class="sub-box"><div class="text-[9px] font-bold mb-1">COM RA</div><div class="f-row"><span class="f-label !w-10">Port:</span><input type="text" value="8" class="f-input center"></div><div class="f-row"><span class="f-label !w-10">Baud:</span><input type="text" value="19200" class="f-input center"></div><label class="check-box"><input type="checkbox"><span class="text-[10px]">UHF</span></label></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 3: CARDS -->
        <div id="tab-cards" class="tab-pane">
            <div class="tech-group">
                <span class="group-label">Quản lý Loại Thẻ</span>
                <div style="height: 200px; border: 1px solid #CCC; background: #FFF; overflow-y: auto; margin-bottom: 15px;">
                    <table class="win-table w-full">
                        <thead class="sticky top-0"><tr><th>Mã Thẻ</th><th>Tên Loại Thẻ</th><th class="text-center">Tính Tiền</th></tr></thead>
                        <tbody><tr class="active"><td>VT</td><td>Vé tháng cư dân</td><td class="text-center">0</td></tr></tbody>
                    </table>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="f-row"><span class="f-label">Mã loại:</span><input type="text" class="f-input font-bold"></div>
                    <div class="f-row"><span class="f-label">Diễn giải:</span><input type="text" class="f-input"></div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <label class="check-box"><input type="checkbox"><span class="text-xs font-bold text-gray-600">Tính tiền vượt mức</span></label>
                    <div class="flex gap-2"><button class="btn-action"><i class="fas fa-edit"></i> Sửa</button><button class="btn-action btn-danger"><i class="fas fa-trash"></i> Xóa</button><button class="btn-action btn-blue"><i class="fas fa-plus"></i> Thêm</button></div>
                </div>
            </div>
        </div>

        <!-- TAB 4: PRICING -->
        <div id="tab-pricing" class="tab-pane">
            <div class="pricing-header-row">
                <div class="flex items-center gap-4 text-[11px] font-black uppercase">
                    <label class="check-box"><input type="checkbox" checked> PP1 :</label>
                    <label class="check-box text-red-600"><input type="radio" name="pp" checked> Loại 1(Qđ 35)</label>
                    <label class="check-box"><input type="radio" name="pp"> Loại 2</label>
                    <label class="check-box"><input type="radio" name="pp"> Loại 3</label>
                    <label class="check-box"><input type="radio" name="pp"> Loại 4</label>
                    <label class="check-box"><input type="radio" name="pp"> Loại 5</label>
                </div>
                <button onclick="toggleGuide()" class="text-red-700 italic underline text-[10px]">Xem chi tiết</button>
            </div>
            <div class="p-matrix">
                <div>
                    <div class="f-row"><span class="f-label !w-16">Từ Giờ</span><input type="text" value="06:00:00" class="f-input center"></div>
                    <div class="f-row"><span class="f-label !w-16">Đến Giờ</span><input type="text" value="22:00:00" class="f-input center"></div>
                    <label class="check-box mt-3 font-bold"><input type="checkbox" checked>Thời gian miễn phí</label>
                    <div class="f-row mt-1 ml-4"><input type="text" value="300" class="f-input center !w-16"><span class="text-[9px] italic ml-1">(giây)</span></div>
                </div>
                <div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền XS</span><input type="text" value="5000" class="f-input right font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền TG</span><input type="text" value="5000" class="f-input right font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">Giá Tiền XĐ</span><input type="text" value="0" class="f-input right"></div>
                </div>
                <div style="border-left: 1px solid #CCC; padding-left: 15px;">
                    <div class="f-row"><span class="f-label !w-24">1 Ngày XS</span><input type="text" value="15000" class="f-input right font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">1 Ngày TG</span><input type="text" value="15000" class="f-input right font-bold"></div>
                    <div class="f-row"><span class="f-label !w-24">1 Ngày XĐ</span><input type="text" value="0" class="f-input right"></div>
                </div>
            </div>
            <div class="tech-group">
                <span class="group-label">Tính tiền xe hơi</span>
                <div class="grid grid-cols-2 gap-10">
                    <div class="flex gap-2 items-center"><div><div class="f-row"><span class="f-label !w-16">Từ</span><input type="text" value="05:30:00" class="f-input center"></div><div class="f-row"><span class="f-label !w-16">Đến</span><input type="text" value="12:00:00" class="f-input center"></div></div><div class="f-row"><span class="f-label !w-16 font-bold">Giá</span><input type="text" value="20000" class="f-input right font-bold text-blue-800"></div></div>
                    <div class="flex gap-2 items-center"><div><div class="f-row"><span class="f-label !w-16">Từ</span><input type="text" value="12:00:00" class="f-input center"></div><div class="f-row"><span class="f-label !w-16">Đến</span><input type="text" value="23:59:59" class="f-input center"></div></div><div class="f-row"><span class="f-label !w-16 font-bold">Giá</span><input type="text" value="30000" class="f-input right font-bold text-blue-800"></div></div>
                </div>
            </div>
            <div class="p-purple">
                <label class="check-box mb-2"><input type="checkbox"><span>Tính tiền vé tháng</span></label>
                <div class="flex justify-between items-center px-2">
                    <div class="flex gap-10"><div class="f-row"><span class="f-label !w-16">Từ</span><input type="text" value="09:18:11" class="f-input center"></div><div class="f-row"><span class="f-label !w-16">Đến</span><input type="text" value="09:18:11" class="f-input center"></div></div>
                    <div class="f-row"><span class="f-label">Giá tiền</span><input type="text" class="f-input right !w-32"></div>
                </div>
                <div class="flex justify-between mt-2 items-center"><div style="font-size: 11px; font-weight: 900; color: red; flex: 1; text-align: center; letter-spacing: 2px;">A —————————— MIỄN PHÍ —————————— B</div><div class="f-row"><span class="f-label">Phí qua đêm</span><input type="text" class="f-input right !w-32 font-bold text-red-600"></div></div>
            </div>
            <div class="p-grey">
                <div class="flex items-center gap-10 mb-2"><label class="check-box"><input type="checkbox">Tính tiền theo ngày</label><div class="f-row"><span class="f-label !w-16">Giá tiền</span><input type="text" class="f-input right !w-24 font-bold"></div><label class="check-box ml-auto"><input type="checkbox">Tính tiền nhiều loại vé ôtô</label></div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                    <div><label class="check-box mb-1"><input type="checkbox">Loại vé</label><div class="f-row"><span class="f-label">Số tiếng</span><input type="text" value="1" class="f-input center !w-16"></div><div class="f-row"><span class="f-label text-blue-800">Đêm TG</span><input type="text" class="f-input right"></div><div class="f-row"><span class="f-label text-blue-800">Đêm XS</span><input type="text" class="f-input right"></div></div>
                    <div><div class="f-row mt-6"><span class="f-label !w-32">Số tiếng Xe hơi</span><input type="text" value="1" class="f-input center !w-16"></div><div class="f-row"><span class="f-label text-blue-800">Tiền xe máy</span><input type="text" class="f-input right"></div><div class="f-row"><span class="f-label text-blue-800">Tiền xe đạp</span><input type="text" class="f-input right"></div></div>
                    <div><div class="f-row mt-6"><span class="f-label text-blue-800">Giá Hơi</span><input type="text" class="f-input right font-black"></div><div class="f-row"><span class="f-label text-red-700">Vé tay ga</span><input type="text" class="f-input right font-black"></div></div>
                </div>
            </div>
            <div class="p-blue">
                <label class="check-box mb-2 font-bold"><input type="checkbox">Tính tiền theo giờ, bậc thang...</label>
                <div class="grid grid-cols-3 gap-2">
                    <div class="bg-white/50 p-2 border border-blue-300"><div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"><span class="ml-auto font-black text-red-600">1</span></div><div class="f-row mt-1"><span class="f-label">Giá xe số</span><input type="text" class="f-input right"></div><div class="f-row"><span class="f-label">Giá xe TG</span><input type="text" class="f-input right"></div></div>
                    <div class="bg-white/50 p-2 border border-blue-300"><div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"><span class="ml-auto font-black text-red-600">2</span></div><div class="f-row mt-1"><span class="f-label">Giá xe số</span><input type="text" class="f-input right"></div><div class="f-row"><span class="f-label">Giá xe TG</span><input type="text" class="f-input right"></div></div>
                    <div class="bg-white/50 p-2 border border-blue-300"><div class="f-row"><span class="f-label !w-16">>= số giờ</span><input type="text" class="f-input center !w-16"><span class="ml-auto font-black text-red-600">3</span></div><div class="f-row mt-1"><span class="f-label">Giá xe số</span><input type="text" class="f-input right"></div><div class="f-row"><span class="f-label">Giá xe TG</span><input type="text" class="f-input right"></div></div>
                </div>
            </div>
        </div>

        <!-- TAB 5: ADVANCED (MATCH IMAGE 3) -->
        <div id="tab-advanced" class="tab-pane">
            <div class="grid-2">
                <div>
                    <div class="tech-group">
                        <span class="group-label">Đảo làn</span>
                        <label class="check-box mb-2"><input type="checkbox" checked><span>Tắt hoặc mở tính năng đảo làn (mặc định không chọn là mở)</span></label>
                        <div class="ml-6 space-y-1">
                            <label class="check-box"><input type="checkbox"><span>Đảo camera 1,2 - 5,6 or 3,4 - 7,8</span></label>
                            <label class="check-box"><input type="checkbox"><span>Đảo làn và đảo camera khi sử dụng 8 camera</span></label>
                        </div>
                        <div style="font-size: 10px; font-weight: 900; color: #999; margin: 10px 0 5px 0; border-bottom: 1px dashed #DDD;">ĐẦU ĐỌC THẺ</div>
                        <label class="check-box mb-1"><input type="checkbox"><span>Đầu đọc Mifare (không chọn mặc định là đầu proxy)</span></label>
                        <div class="grid grid-cols-2 gap-2 ml-4">
                            <label class="check-box"><input type="checkbox"><span>Dùng 1 đầu đọc vào ra</span></label>
                            <label class="check-box"><input type="checkbox"><span>2 làn vào / 2 làn ra</span></label>
                            <label class="check-box"><input type="checkbox"><span>Tự xóa thẻ</span></label>
                            <label class="check-box"><input type="checkbox"><span>Đầu đọc Soyal / Đọc 10 số</span></label>
                        </div>
                    </div>
                    <div class="tech-group">
                        <span class="group-label">Nhận dạng biển số tự động</span>
                        <div class="flex items-center gap-4 mb-2">
                            <label class="check-box"><input type="checkbox" checked><span>NHẬN DẠNG</span></label>
                            <label class="check-box"><input type="checkbox" checked><span>Nhanh</span></label>
                            <label class="check-box"><input type="checkbox"><span>AI</span></label>
                            <label class="check-box"><input type="checkbox"><span>Lưu Sửa BS</span></label>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="f-row"><span class="f-label !w-16 text-right">Phải:</span><input type="text" value="1" class="f-input center !w-12"></div>
                            <div class="f-row"><span class="f-label !w-16 text-right">Trái:</span><input type="text" value="1" class="f-input center !w-12"></div>
                        </div>
                        <label class="check-box mt-2"><input type="checkbox" checked><span>Lấy số đuôi</span></label>
                        <label class="check-box mt-1"><input type="checkbox" checked><span>Xử lý khung hình 2 bs</span></label>
                        <div style="font-size: 10px; font-weight: 900; color: #999; margin: 10px 0 5px 0; border-bottom: 1px dashed #DDD;">CAMERA & DỪNG HÌNH</div>
                        <label class="check-box mb-1"><input type="checkbox" checked><span>Chọn là dùng 4 camera</span></label>
                        <div class="flex gap-6"><label class="check-box"><input type="checkbox" checked><span>Dừng hình (Làn vào)</span></label><label class="check-box"><input type="checkbox" checked><span>Dừng hình (Làn ra)</span></label></div>
                    </div>
                    <div class="tech-group">
                        <span class="group-label">Bảng LED</span>
                        <div class="flex gap-4 mb-2"><label class="check-box"><input type="radio" name="led" checked><span>Led COM</span></label><label class="check-box"><input type="radio" name="led"><span>Led IP</span></label></div>
                        <label class="check-box mb-1"><input type="checkbox"><span>Hiển thị chỗ trống</span></label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="check-box"><input type="checkbox"><span>Kết nối Bảng Led Ra</span></label>
                            <div class="f-row"><span class="f-label !w-10">COM</span><input type="text" value="3" class="f-input center"></div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-1">
                            <label class="check-box"><input type="checkbox"><span>Kết nối bảng Led vào</span></label>
                            <div class="f-row"><span class="f-label !w-10">COM</span><input type="text" value="3" class="f-input center"></div>
                        </div>
                        <label class="check-box mt-1"><input type="checkbox"><span>Bảng Led 2 dòng</span></label>
                    </div>
                </div>
                <div>
                    <div class="tech-group">
                        <span class="group-label">Đăng nhập & Barie</span>
                        <label class="check-box mb-1"><input type="checkbox" checked><span>Tự động đăng nhập vào ca làm việc</span></label>
                        <label class="check-box mb-3"><input type="checkbox"><span>Đăng nhập vào quản trị khi nhấn F4</span></label>
                        <div style="font-size: 10px; font-weight: 900; color: #999; margin: 10px 0 5px 0; border-bottom: 1px dashed #DDD;">ĐIỀU KHIỂN BARIE</div>
                        <div class="f-row"><label class="check-box"><input type="checkbox" checked><span>Sử dụng điều khiển barie COM</span></label><input type="text" value="10" class="f-input !flex-none w-12 center ml-auto"></div>
                        <div class="ml-6 space-y-1">
                            <label class="check-box"><input type="checkbox" checked><span>Tự động mở barie (Không mở cho vé hơi)</span></label>
                            <label class="check-box"><input type="checkbox" checked><span>Mở barie cho tất cả loại thẻ</span></label>
                            <label class="check-box"><input type="checkbox" checked><span>Nhận dạng đúng biến số xe ra vào mới mở</span></label>
                            <label class="check-box"><input type="checkbox"><span>Thông báo mở barie khi quét thẻ cho xe ra</span></label>
                            <label class="check-box"><input type="checkbox"><span>Chỉ mở barie cho xe hơi VL và VT-XH</span></label>
                        </div>
                        <div class="grid grid-cols-2 gap-2 ml-6 mt-2">
                            <label class="check-box"><input type="checkbox"><span>Dùng nút đảo làn</span></label>
                            <label class="check-box"><input type="checkbox"><span>Loop Nhận dạng</span></label>
                        </div>
                    </div>
                    <div class="tech-group bg-yellow-50/50">
                        <span class="group-label">Vé tháng & Thông báo</span>
                        <div class="f-row"><label class="check-box"><input type="checkbox"><span>Tính tiền vé tháng quá hạn</span></label><div class="ml-auto flex gap-2"><input type="text" value="5000" class="f-input !w-16 right"><input type="text" value="10000" class="f-input !w-16 right"></div></div>
                        <div class="f-row mt-3"><span class="f-label">Kích thước font chữ:</span><input type="text" value="40" class="f-input !flex-none w-16 center font-black"></div>
                        <div class="f-row mt-1"><label class="check-box"><input type="checkbox"><span>Chọn thông báo:</span></label><input type="text" value="4" class="f-input !flex-none w-12 center ml-auto font-bold"><span class="text-[10px] font-bold">NGÀY</span></div>
                        <div class="mt-2 space-y-1">
                            <label class="check-box"><input type="checkbox"><span>Hiển thị hình ảnh người dùng khi đăng ký</span></label>
                            <label class="check-box"><input type="checkbox"><span>Hiển thị hình ảnh người dùng khi ra vào</span></label>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button class="btn-action w-full"><i class="fas fa-trash-alt"></i> Xóa DL trùng</button>
                        <button class="btn-action w-full"><i class="fas fa-print"></i> Thông tin in báo cáo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div style="display: flex; justify-content: flex-end; gap: 10px; padding: 8px 15px; background: #E1E1E1; border-top: 1px solid #999; flex-shrink: 0;">
        <button class="btn-action px-10">Close</button>
        <button class="btn-action btn-blue px-12 font-bold">Save</button>
    </div>
</div>

<!-- GUIDE MODAL -->
<div id="guideModal" class="guide-modal" onclick="if(event.target==this) toggleGuide()">
    <div class="guide-window">
        <div class="bg-[#0B3D91] text-white p-3 flex justify-between items-center font-bold"><span>HƯỚNG DẪN CẤU HÌNH LOẠI BẢNG GIÁ</span><button onclick="toggleGuide()">✖</button></div>
        <div class="p-4 overflow-y-auto max-h-[450px] space-y-4 text-xs">
            <div class="bg-blue-50 p-3 border-l-4 border-blue-600"><p class="font-black text-blue-900 uppercase">Loại 1: Khung 2 múi giờ (QĐ 32)</p><p>5h-21h (Ngày) và 21h-5h (Đêm). Đặt Từ 5:00:00 -> 21:00:00.</p></div>
            <div class="bg-gray-50 p-3 border-l-4 border-gray-600"><p class="font-black text-gray-900 uppercase">Loại 4: Lệch múi giờ 2 tiếng</p><p>Chỉ tính cộng dồn khi tổng giờ lưu bãi hơn 2 tiếng. VD: Vào 5h59 ra 6h01 vẫn tính 3000đ.</p></div>
            <div class="bg-purple-50 p-3 border-l-4 border-purple-600"><p class="font-black text-purple-900 uppercase">Loại 5: Vượt 9h sáng mới cộng dồn</p><p>Nếu vào từ đêm và ra trước 9h sáng thì chỉ thu giá ngày (3000đ).</p></div>
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
        const titles = { system: 'Hệ Thống', hardware: 'Thiết bị & Camera', cards: 'Loại thẻ', pricing: 'Cấu hình Giá Tiền', advanced: 'Nâng cao' };
        document.getElementById('tab-title').innerText = 'Cấu hình ' + titles[tabId];
    }
    function toggleGuide() {
        const modal = document.getElementById('guideModal');
        modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
    }
</script>
@endsection
