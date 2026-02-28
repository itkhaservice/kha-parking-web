<div id="tab-advanced" class="tab-pane">
    <div class="grid grid-2">
        <!-- CỘT TRÁI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Đảo làn</span>
                <label class="check-box mb-2"><input type="checkbox" name="adv_reverse_lane"><span>Tắt hoặc mở tính năng đảo làn (mặc định mở)</span></label>
                <div class="ml-6 space-y-1 p-2 bg-gray-100/50 rounded border border-dashed border-gray-300">
                    <label class="check-box text-[10px]"><input type="checkbox" name="adv_reverse_cam_8"><span>Đảo camera 1,2 - 5,6 hoặc 3,4 - 7,8 (OTO 8 cam)</span></label>
                    <label class="check-box text-[10px] mt-1"><input type="checkbox" name="adv_reverse_cam_full"><span>Đảo làn và đảo camera khi sử dụng 8 camera</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Đầu đọc thẻ</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox" name="adv_reader_mifare"><span>Đầu đọc Mifare (Proxy mặc định)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_single"><span>Dùng 1 đầu đọc vào ra</span></label>
                </div>
                <div class="flex gap-4 mt-2 py-1 border-y border-gray-200">
                    <label class="check-box"><input type="checkbox" name="adv_reader_2in"><span>2 làn vào</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_2out"><span>2 làn ra</span></label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 mt-2">
                    <label class="check-box"><input type="checkbox" name="adv_card_autodelete"><span>Tự xóa thẻ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_card_old_code"><span>Mã thẻ cũ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_soyal"><span>Đầu đọc Soyal</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_10num"><span>Đọc 10 số</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Nhận dạng biển số tự động</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox" name="adv_ai_active" checked><span>Nhận dạng</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_fast" checked><span>Nhanh</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_deep"><span>AI Deep</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_save_edit"><span>Lưu sửa BS</span></label>
                </div>
                <div class="flex gap-4 mt-2">
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay phải:</span><input type="text" name="adv_ai_rot_r" value="1" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay trái:</span><input type="text" name="adv_ai_rot_l" value="1" class="f-input center !w-12 font-bold"></div>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Bảng Led</span>
                <div class="flex gap-4 mb-2">
                    <label class="check-box"><input type="radio" name="adv_led_type" value="com" checked><span>Led COM</span></label>
                    <label class="check-box"><input type="radio" name="adv_led_type" value="ip"><span>Led IP</span></label>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2 border-t border-dashed">
                    <div class="f-row"><span class="f-label !w-12 text-orange-700">COM Ra:</span><input type="text" name="adv_led_com_out" value="3" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-12 text-green-700">COM Vào:</span><input type="text" name="adv_led_com_in" value="3" class="f-input center !w-12 font-bold"></div>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Tính năng đăng nhập tự động</span>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" name="adv_auto_login_shift" checked><span>Tự động đăng nhập vào ca</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_login_single_user"><span>Login bằng 1 user</span></label>
                    <label class="check-box font-bold text-blue-700"><input type="checkbox" name="adv_f4_admin" checked><span>Đăng nhập quản trị khi nhấn F4</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Điều khiển Barie</span>
                <div class="f-row border-b border-gray-200 pb-2 mb-2">
                    <label class="check-box"><input type="checkbox" name="adv_barrier_active" checked><span class="font-bold">Sử dụng barie</span></label>
                    <span class="f-label ml-auto">COM:</span><input type="text" name="adv_barrier_com" value="10" class="f-input center !w-12 font-bold">
                </div>
                <div class="flex gap-4 mb-3">
                    <div class="f-row flex-1"><span class="f-label !w-12">Role 1:</span><input type="text" name="adv_barrier_role1" value="c100" class="f-input mono center flex-1"></div>
                    <div class="f-row flex-1"><span class="f-label !w-12 text-right">Role 2:</span><input type="text" name="adv_barrier_role2" value="c000" class="f-input mono center flex-1"></div>
                </div>
                <div class="space-y-1 text-[10px]">
                    <label class="check-box"><input type="checkbox" name="adv_barrier_auto_open" checked><span>Tự động mở (Trừ Xe hơi)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_barrier_open_all" checked><span>Mở cho tất cả loại thẻ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_barrier_confirm_plate" checked><span>Nhận dạng đúng BS mới mở</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Tính tiền vượt thời gian vé tháng</span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="f-row"><span class="f-label !w-16 text-[10px]">Tiền XM:</span><input type="text" name="adv_overtime_xm" value="5000" class="f-input right font-bold flex-1 text-red-600"></div>
                    <div class="f-row"><span class="f-label !w-16 text-[10px]">Tiền XH:</span><input type="text" name="adv_overtime_xh" value="10000" class="f-input right font-bold flex-1 text-red-600"></div>
                </div>
            </div>

            <div class="tech-group border-transparent !bg-transparent !p-0 space-y-2 mt-4">
                <button onclick="saveAllSettings()" class="btn-action btn-blue w-full justify-center font-bold text-sm h-10 shadow-lg"><i class="fas fa-save mr-2"></i>LƯU CẤU HÌNH (SAVE ALL)</button>
            </div>
        </div>
    </div>
</div>
