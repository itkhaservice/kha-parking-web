<div id="tab-advanced" class="tab-pane">
    <div class="grid grid-2">
        <!-- CỘT TRÁI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Đảo làn</span>
                <label class="check-box mb-2">
                    <input type="checkbox" name="adv_reverse_lane" {{ ($settings['adv_reverse_lane'] ?? 0) == 1 ? 'checked' : '' }}>
                    <span>Tắt hoặc mở tính năng đảo làn (mặc định mở)</span>
                </label>
                <div class="ml-6 space-y-1 p-2 bg-gray-100/50 rounded border border-dashed border-gray-300">
                    <label class="check-box text-[10px]">
                        <input type="checkbox" name="adv_reverse_cam_8" {{ ($settings['adv_reverse_cam_8'] ?? 0) == 1 ? 'checked' : '' }}>
                        <span>Đảo camera 1,2 - 5,6 hoặc 3,4 - 7,8 (Dùng cho làn xe sOTO 8 cam)</span>
                    </label>
                    <div class="text-[9px] text-red-600 font-bold italic">* Bắt buộc phải chọn tất tính năng đảo làn</div>
                </div>
                <label class="check-box mt-2">
                    <input type="checkbox" name="adv_reverse_cam_full" {{ ($settings['adv_reverse_cam_full'] ?? 0) == 1 ? 'checked' : '' }}>
                    <span>Đảo làn và đảo camera khi sử dụng 8 camera (1,2->5,6 | 3,4->7,8)</span>
                </label>
            </div>

            <div class="tech-group">
                <span class="group-label">Đầu đọc thẻ</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox" name="adv_reader_mifare" {{ ($settings['adv_reader_mifare'] ?? 0) == 1 ? 'checked' : '' }}><span>Đầu đọc Mifare (Proxy mặc định)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_single" {{ ($settings['adv_reader_single'] ?? 0) == 1 ? 'checked' : '' }}><span>Dùng 1 đầu đọc vào ra</span></label>
                </div>
                <div class="flex gap-4 mt-2 py-1 border-y border-gray-200">
                    <label class="check-box"><input type="checkbox" name="adv_reader_2in" {{ ($settings['adv_reader_2in'] ?? 0) == 1 ? 'checked' : '' }}><span>2 làn vào</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_2out" {{ ($settings['adv_reader_2out'] ?? 0) == 1 ? 'checked' : '' }}><span>2 làn ra</span></label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 mt-2">
                    <label class="check-box"><input type="checkbox" name="adv_card_autodelete" {{ ($settings['adv_card_autodelete'] ?? 0) == 1 ? 'checked' : '' }}><span>Tự xóa thẻ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_card_old_code" {{ ($settings['adv_card_old_code'] ?? 0) == 1 ? 'checked' : '' }}><span>Mã thẻ cũ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_soyal" {{ ($settings['adv_reader_soyal'] ?? 0) == 1 ? 'checked' : '' }}><span>Đầu đọc Soyal</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_reader_10num" {{ ($settings['adv_reader_10num'] ?? 0) == 1 ? 'checked' : '' }}><span>Đọc 10 số</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Nhận dạng biển số tự động</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox" name="adv_ai_active" {{ ($settings['adv_ai_active'] ?? 1) == 1 ? 'checked' : '' }}><span>Nhận dạng</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_fast" {{ ($settings['adv_ai_fast'] ?? 1) == 1 ? 'checked' : '' }}><span>Nhanh</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_deep" {{ ($settings['adv_ai_deep'] ?? 0) == 1 ? 'checked' : '' }}><span>AI Deep</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_save_edit" {{ ($settings['adv_ai_save_edit'] ?? 0) == 1 ? 'checked' : '' }}><span>Lưu sửa BS</span></label>
                </div>
                <div class="flex gap-4 mt-2">
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay phải:</span><input type="text" name="adv_ai_rot_r" value="{{ $settings['adv_ai_rot_r'] ?? '1' }}" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay trái:</span><input type="text" name="adv_ai_rot_l" value="{{ $settings['adv_ai_rot_l'] ?? '1' }}" class="f-input center !w-12 font-bold"></div>
                </div>
                <div class="flex gap-4 mt-1">
                    <label class="check-box"><input type="checkbox" name="adv_ai_get_bottom" {{ ($settings['adv_ai_get_bottom'] ?? 1) == 1 ? 'checked' : '' }}><span>Lấy số dưới</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_ai_process_2bs" {{ ($settings['adv_ai_process_2bs'] ?? 1) == 1 ? 'checked' : '' }}><span>Xử lý khung hình 2bs</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Lựa chọn Camera</span>
                <label class="check-box"><input type="checkbox" name="adv_cam_4" {{ ($settings['adv_cam_4'] ?? 1) == 1 ? 'checked' : '' }}><span>Chọn là dùng 4 camera (Không chọn là 2 camera)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Tính năng dùng hình</span>
                <div class="flex gap-4">
                    <label class="check-box"><input type="checkbox" name="adv_use_img_in" {{ ($settings['adv_use_img_in'] ?? 1) == 1 ? 'checked' : '' }}><span>Dùng hình ảnh (Làn vào)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_use_img_out" {{ ($settings['adv_use_img_out'] ?? 1) == 1 ? 'checked' : '' }}><span>Dùng hình ảnh (Làn ra)</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Bảng Led</span>
                <div class="flex gap-4 mb-2">
                    <label class="check-box"><input type="radio" name="adv_led_type" value="com" {{ ($settings['adv_led_type'] ?? 'com') == 'com' ? 'checked' : '' }}><span>Led COM</span></label>
                    <label class="check-box"><input type="radio" name="adv_led_type" value="ip" {{ ($settings['adv_led_type'] ?? '') == 'ip' ? 'checked' : '' }}><span>Led IP</span></label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 mb-2">
                    <label class="check-box"><input type="checkbox" name="adv_led_show_empty" {{ ($settings['adv_led_show_empty'] ?? 0) == 1 ? 'checked' : '' }}><span>Hiển thị ô trống</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_led_conn_out" {{ ($settings['adv_led_conn_out'] ?? 0) == 1 ? 'checked' : '' }}><span>Kết nối Bảng Led Ra</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_led_conn_in" {{ ($settings['adv_led_conn_in'] ?? 0) == 1 ? 'checked' : '' }}><span>Kết nối Bảng Led Vào</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_led_2_lines" {{ ($settings['adv_led_2_lines'] ?? 0) == 1 ? 'checked' : '' }}><span>Bảng Led 2 dòng</span></label>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2 border-t border-dashed">
                    <div class="f-row"><span class="f-label !w-12 text-orange-700">COM Ra:</span><input type="text" name="adv_led_com_out" value="{{ $settings['adv_led_com_out'] ?? '3' }}" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-12 text-green-700">COM Vào:</span><input type="text" name="adv_led_com_in" value="{{ $settings['adv_led_com_in'] ?? '3' }}" class="f-input center !w-12 font-bold"></div>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Cấu hình trạng thái quẹt thẻ</span>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" name="adv_swipe_lane_l_basic" {{ ($settings['adv_swipe_lane_l_basic'] ?? 0) == 1 ? 'checked' : '' }}><span>Quẹt các thẻ VT, NV, VIP... (làn trái)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_swipe_lane_l_adv" {{ ($settings['adv_swipe_lane_l_adv'] ?? 0) == 1 ? 'checked' : '' }}><span>Quẹt thẻ VL-XH, VT-XH, VT-TT, Barie, MP (làn trái)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_swipe_lane_r_basic" {{ ($settings['adv_swipe_lane_r_basic'] ?? 0) == 1 ? 'checked' : '' }}><span>Quẹt các thẻ VT, NV, VIP... (làn phải)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_swipe_lane_r_adv" {{ ($settings['adv_swipe_lane_r_adv'] ?? 0) == 1 ? 'checked' : '' }}><span>Quẹt thẻ VL-XH, VT-XH, VT-TT, Barie, MP (làn phải)</span></label>
                    <label class="check-box font-bold text-red-600 italic"><input type="checkbox" name="adv_show_exit_notice" {{ ($settings['adv_show_exit_notice'] ?? 0) == 1 ? 'checked' : '' }}><span>Hiển thị thông báo trước khi cho xe ra</span></label>
                </div>
            </div>

            <div class="tech-group bg-blue-50/50">
                <span class="group-label">Dùng thử phần mềm</span>
                <label class="check-box"><input type="checkbox" name="adv_trial_mode" {{ ($settings['adv_trial_mode'] ?? 0) == 1 ? 'checked' : '' }}><span>Chọn dùng thử (Không chọn là dùng luôn)</span></label>
                <label class="check-box mt-1"><input type="checkbox" name="adv_pgup_pgdn_price" {{ ($settings['adv_pgup_pgdn_price'] ?? 0) == 1 ? 'checked' : '' }}><span>Tăng giá tiền xe ra khi nhấn nút PgUp hoặc PgDn</span></label>
            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Tính năng đăng nhập tự động</span>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" name="adv_auto_login_shift" {{ ($settings['adv_auto_login_shift'] ?? 1) == 1 ? 'checked' : '' }}><span>Tự động đăng nhập vào ca làm việc</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_login_single_user" {{ ($settings['adv_login_single_user'] ?? 0) == 1 ? 'checked' : '' }}><span>Login bằng 1 user</span></label>
                    <label class="check-box font-bold text-blue-700"><input type="checkbox" name="adv_f4_admin" {{ ($settings['adv_f4_admin'] ?? 1) == 1 ? 'checked' : '' }}><span>Đăng nhập tự động vào quản trị khi nhấn F4</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Điều khiển Barie</span>
                <div class="f-row border-b border-gray-200 pb-2 mb-2">
                    <label class="check-box"><input type="checkbox" name="adv_barrier_active" {{ ($settings['adv_barrier_active'] ?? 1) == 1 ? 'checked' : '' }}><span class="font-bold">Sử dụng điều khiển barie</span></label>
                    <span class="f-label ml-auto">Cổng COM:</span><input type="text" name="adv_barrier_com" value="{{ $settings['adv_barrier_com'] ?? '10' }}" class="f-input center !w-12 font-bold">
                </div>
                <div class="flex gap-4 mb-3">
                    <div class="f-row flex-1"><span class="f-label !w-12">Role 1:</span><input type="text" name="adv_barrier_role1" value="{{ $settings['adv_barrier_role1'] ?? 'c100' }}" class="f-input mono center flex-1"></div>
                    <div class="f-row flex-1"><span class="f-label !w-12 text-right">Role 2:</span><input type="text" name="adv_barrier_role2" value="{{ $settings['adv_barrier_role2'] ?? 'c000' }}" class="f-input mono center flex-1"></div>
                </div>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" name="adv_barrier_auto_open" {{ ($settings['adv_barrier_auto_open'] ?? 1) == 1 ? 'checked' : '' }}><span>Tự động mở barie (Không mở cho vé Xe hơi)</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_barrier_open_all" {{ ($settings['adv_barrier_open_all'] ?? 1) == 1 ? 'checked' : '' }}><span>Mở barie cho tất cả loại thẻ</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_barrier_confirm_plate" {{ ($settings['adv_barrier_confirm_plate'] ?? 1) == 1 ? 'checked' : '' }}><span>Nhận dạng đúng biển số xe ra mới mở barie</span></label>
                    <label class="check-box font-bold text-green-700"><input type="checkbox" name="adv_barrier_notice_out" {{ ($settings['adv_barrier_notice_out'] ?? 1) == 1 ? 'checked' : '' }}><span>Thông báo mở barie khi quẹt thẻ ra (vé tháng)</span></label>
                </div>
                <div class="mt-2 pt-2 border-t border-dashed space-y-1">
                    <label class="check-box"><input type="checkbox" name="adv_barrier_xh_only" {{ ($settings['adv_barrier_xh_only'] ?? 0) == 1 ? 'checked' : '' }}><span>Chỉ mở barie cho xe hơi VL và VT-XH</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_btn_reverse_lane" {{ ($settings['adv_btn_reverse_lane'] ?? 0) == 1 ? 'checked' : '' }}><span>Dùng nút bấm đảo làn</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_loop_xh_vt" {{ ($settings['adv_loop_xh_vt'] ?? 0) == 1 ? 'checked' : '' }}><span>Loop nhận dạng XH vé tháng</span></label>
                    <label class="check-box"><input type="checkbox" name="adv_loop_uhf" {{ ($settings['adv_loop_uhf'] ?? 0) == 1 ? 'checked' : '' }}><span>Loop quẹt thẻ - UHF</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Trạng thái Barie</span>
                <label class="check-box"><input type="checkbox" name="adv_barrier_status_on" {{ ($settings['adv_barrier_status_on'] ?? 0) == 1 ? 'checked' : '' }}><span>Chọn là mở (không chọn là tắt)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Tính tiền vượt thời gian gửi vé tháng</span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="f-row"><span class="f-label !w-16">Tiền XM:</span><input type="text" name="adv_overtime_xm" value="{{ $settings['adv_overtime_xm'] ?? '5000' }}" class="f-input right font-bold flex-1 text-red-600"></div>
                    <div class="f-row"><span class="f-label !w-16">Tiền XH:</span><input type="text" name="adv_overtime_xh" value="{{ $settings['adv_overtime_xh'] ?? '10000' }}" class="f-input right font-bold flex-1 text-red-600"></div>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Font chữ hiển thị thông tin</span>
                <div class="f-row">
                    <label class="check-box"><input type="checkbox" name="adv_font_show" {{ ($settings['adv_font_show'] ?? 0) == 1 ? 'checked' : '' }}><span>Hiển thị</span></label>
                    <span class="f-label ml-auto">Font Size:</span><input type="text" name="adv_font_size" value="{{ $settings['adv_font_size'] ?? '40' }}" class="f-input center !w-16 font-black text-lg">
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Thông báo thẻ tháng hết hiệu lực</span>
                <div class="f-row">
                    <label class="check-box"><input type="checkbox" name="adv_notice_expire_active" {{ ($settings['adv_notice_expire_active'] ?? 0) == 1 ? 'checked' : '' }}><span>Chọn thông báo</span></label>
                    <span class="f-label ml-auto">Số ngày báo:</span><input type="text" name="adv_notice_expire_days" value="{{ $settings['adv_notice_expire_days'] ?? '4' }}" class="f-input center !w-12 font-bold">
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Hình ảnh người dùng (Vé tháng)</span>
                <label class="check-box"><input type="checkbox" name="adv_show_user_img" {{ ($settings['adv_show_user_img'] ?? 0) == 1 ? 'checked' : '' }}><span>Hiển thị hình ảnh người đăng ký khi quét thẻ ra vào</span></label>
            </div>

            <div class="tech-group bg-yellow-50/50">
                <span class="group-label">Cập nhật thông tin tự động</span>
                <label class="check-box"><input type="checkbox" name="adv_auto_update_count" {{ ($settings['adv_auto_update_count'] ?? 0) == 1 ? 'checked' : '' }}><span>Cập nhật tự động số lượng vào ra (2s/lần - chỉ máy con)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Ẩn thông tin IN OUT</span>
                <label class="check-box"><input type="checkbox" name="adv_hide_in_out" {{ ($settings['adv_hide_in_out'] ?? 0) == 1 ? 'checked' : '' }}><span>Ẩn thông tin IN OUT trên màn hình</span></label>
            </div>

            <div class="tech-group border-transparent !bg-transparent !p-0 space-y-2 mt-4">
                <label class="check-box italic text-[11px]"><input type="checkbox" name="adv_convert_to_vt" {{ ($settings['adv_convert_to_vt'] ?? 0) == 1 ? 'checked' : '' }}><span>Cập nhật vé lượt thành vé tháng (BS đã đăng ký)</span></label>
                <div class="grid grid-cols-1 gap-2">
                    <button type="button" class="btn-action w-full justify-center"><i class="fas fa-trash-alt mr-2"></i> XÓA DỮ LIỆU TRÙNG</button>
                    <button type="button" class="btn-action w-full justify-center"><i class="fas fa-print mr-2"></i> THÔNG TIN IN TRÊN BÁO CÁO</button>
                    <button type="button" onclick="saveAllSettings()" class="btn-action btn-blue w-full justify-center font-bold text-sm h-10 shadow-lg"><i class="fas fa-save mr-2"></i>LƯU CẤU HÌNH (SAVE ALL)</button>
                </div>
            </div>
        </div>
    </div>
</div>
