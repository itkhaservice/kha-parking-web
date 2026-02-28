<div id="tab-advanced" class="tab-pane">
    <div class="grid-2">
        <!-- CỘT TRÁI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Đảo làn</span>
                <label class="check-box mb-2"><input type="checkbox"><span>Tắt hoặc mở tính năng đảo làn (mặc định không chọn là mở)</span></label>
                <div class="ml-6 space-y-1 p-2 bg-gray-100/50 rounded border border-dashed border-gray-300">
                    <label class="check-box text-[10px]"><input type="checkbox"><span>Đảo camera 1,2 - 5,6 hoặc 3,4 - 7,8 (Dùng cho làn xe sOTO 8 cam)</span></label>
                    <div class="text-[9px] text-red-600 font-bold italic">* Bắt buộc phải chọn tất tính năng đảo làn</div>
                </div>
                <label class="check-box mb-2"><input type="checkbox"><span>Đảo làn và đảo camera khi sử dụng 8 camera (1,2->5,6 | 3,4->7,8)</span></label>

            </div>

            <div class="tech-group">
                <span class="group-label">Đầu đọc thẻ</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox"><span>Đầu đọc Mifare (Proxy mặc định)</span></label>
                    <label class="check-box"><input type="checkbox"><span>Dùng 1 đầu đọc vào ra</span></label>
                </div>
                <div class="flex gap-4 mt-2 py-1 border-y border-gray-200">
                    <label class="check-box"><input type="checkbox"><span>2 làn vào</span></label>
                    <label class="check-box"><input type="checkbox"><span>2 làn ra</span></label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 mt-2">
                    <label class="check-box"><input type="checkbox"><span>Tự xóa thẻ</span></label>
                    <label class="check-box"><input type="checkbox"><span>Mã thẻ</span></label>
                    <label class="check-box"><input type="checkbox"><span>Đầu đọc Soyal</span></label>
                    <label class="check-box"><input type="checkbox"><span>Đọc 10 số</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Nhận dạng biển số tự động</span>
                <div class="grid grid-cols-2 gap-x-2">
                    <label class="check-box"><input type="checkbox" checked><span>Nhận dạng</span></label>
                    <label class="check-box"><input type="checkbox" checked><span>Nhanh</span></label>
                    <label class="check-box"><input type="checkbox"><span>AI</span></label>
                    <label class="check-box"><input type="checkbox"><span>Lưu sửa BS</span></label>
                </div>
                <div class="flex gap-4 mt-2">
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay phải:</span><input type="text" value="1" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row flex-1"><span class="f-label !w-16">Quay trái:</span><input type="text" value="1" class="f-input center !w-12 font-bold"></div>
                </div>
                <div class="flex gap-4 mt-1">
                    <label class="check-box"><input type="checkbox" checked><span>Lấy số dưới</span></label>
                    <label class="check-box"><input type="checkbox" checked><span>Xử lý khung hình 2bs</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Lựa chọn Camera</span>
                <label class="check-box"><input type="checkbox" checked><span>Chọn là dùng 4 camera (Không chọn là 2 camera)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Tính năng dùng hình</span>
                <div class="flex gap-4">
                    <label class="check-box"><input type="checkbox" checked><span>Dùng hình ảnh (Làn vào)</span></label>
                    <label class="check-box"><input type="checkbox" checked><span>Dùng hình ảnh (Làn ra)</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Bảng Led</span>
                <div class="flex gap-4 mb-2">
                    <label class="check-box"><input type="radio" name="led_type" checked><span>Led COM</span></label>
                    <label class="check-box"><input type="radio" name="led_type"><span>Led IP</span></label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 mb-2">
                    <label class="check-box"><input type="checkbox"><span>Hiển thị ô trống</span></label>
                    <label class="check-box"><input type="checkbox"><span>Kết nối Bảng Led Ra</span></label>
                    <label class="check-box"><input type="checkbox"><span>Kết nối Bảng Led Vào</span></label>
                    <label class="check-box"><input type="checkbox"><span>Bảng Led 2 dòng</span></label>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2 border-t border-dashed">
                    <div class="f-row"><span class="f-label !w-12 text-orange-700">COM Ra:</span><input type="text" value="3" class="f-input center !w-12 font-bold"></div>
                    <div class="f-row"><span class="f-label !w-12 text-green-700">COM Vào:</span><input type="text" value="3" class="f-input center !w-12 font-bold"></div>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Cấu hình trạng thái quẹt thẻ</span>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox"><span>Quẹt các thẻ VT, NV, VIP... (làn trái)</span></label>
                    <label class="check-box"><input type="checkbox"><span>Quẹt thẻ VL-XH, VT-XH, VT-TT, Barie, MP (làn trái)</span></label>
                    <label class="check-box"><input type="checkbox"><span>Quẹt các thẻ VT, NV, VIP... (làn phải)</span></label>
                    <label class="check-box"><input type="checkbox"><span>Quẹt thẻ VL-XH, VT-XH, VT-TT, Barie, MP (làn phải)</span></label>
                    <label class="check-box font-bold text-red-600 italic"><input type="checkbox"><span>Hiển thị thông báo trước khi cho xe ra</span></label>
                </div>
            </div>

            <div class="tech-group bg-blue-50/50">
                <span class="group-label">Dùng thử phần mềm</span>
                <label class="check-box"><input type="checkbox"><span>Chọn dùng thử (Không chọn là dùng luôn)</span></label>
                <label class="check-box mt-1"><input type="checkbox"><span>Tăng giá tiền xe ra khi nhấn nút PgUp hoặc PgDn</span></label>
            </div>
        </div>

        <!-- CỘT PHẢI -->
        <div>
            <div class="tech-group">
                <span class="group-label">Tính năng đăng nhập tự động</span>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" checked><span>Tự động đăng nhập vào ca làm việc</span></label>
                    <label class="check-box"><input type="checkbox"><span>Login bằng 1 user</span></label>
                    <label class="check-box font-bold text-blue-700"><input type="checkbox" checked><span>Đăng nhập tự động vào quản trị khi nhấn F4</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Điều khiển Barie</span>
                <div class="f-row border-b border-gray-200 pb-2 mb-2">
                    <label class="check-box"><input type="checkbox" checked><span class="font-bold">Sử dụng điều khiển barie</span></label>
                    <span class="f-label ml-auto">Cổng COM:</span><input type="text" value="10" class="f-input center !w-12 font-bold">
                </div>
                <div class="flex gap-4 mb-3">
                    <div class="f-row flex-1"><span class="f-label !w-12">Role 1:</span><input type="text" value="c100" class="f-input mono center flex-1"></div>
                    <div class="f-row flex-1"><span class="f-label !w-12 text-right">Role 2:</span><input type="text" value="c000" class="f-input mono center flex-1"></div>
                </div>
                <div class="space-y-1">
                    <label class="check-box"><input type="checkbox" checked><span>Tự động mở barie (Không mở cho vé Xe hơi)</span></label>
                    <label class="check-box"><input type="checkbox" checked><span>Mở barie cho tất cả loại thẻ</span></label>
                    <label class="check-box"><input type="checkbox" checked><span>Nhận dạng đúng biển số xe ra mới mở barie</span></label>
                    <label class="check-box font-bold text-green-700"><input type="checkbox" checked><span>Thông báo mở barie khi quẹt thẻ ra (vé tháng)</span></label>
                </div>
                <div class="mt-2 pt-2 border-t border-dashed space-y-1">
                    <label class="check-box"><input type="checkbox"><span>Chỉ mở barie cho xe hơi VL và VT-XH</span></label>
                    <label class="check-box"><input type="checkbox"><span>Dùng nút bấm đảo làn</span></label>
                    <label class="check-box"><input type="checkbox"><span>Loop nhận dạng XH vé tháng</span></label>
                    <label class="check-box"><input type="checkbox"><span>Loop quẹt thẻ - UHF</span></label>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Trạng thái Barie</span>
                <label class="check-box"><input type="checkbox"><span>Chọn là mở (không chọn là tắt)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Tính tiền vượt thời gian gửi vé tháng</span>
                <div class="grid grid-cols-2 gap-4">
                    <div class="f-row"><span class="f-label !w-16">Tiền XM:</span><input type="text" value="5000" class="f-input right font-bold flex-1 text-red-600"></div>
                    <div class="f-row"><span class="f-label !w-16">Tiền XH:</span><input type="text" value="10000" class="f-input right font-bold flex-1 text-red-600"></div>
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Font chữ hiển thị thông tin</span>
                <div class="f-row">
                    <label class="check-box"><input type="checkbox"><span>Hiển thị</span></label>
                    <span class="f-label ml-auto">Font Size:</span><input type="text" value="40" class="f-input center !w-16 font-black text-lg">
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Thông báo thẻ tháng hết hiệu lực</span>
                <div class="f-row">
                    <label class="check-box"><input type="checkbox"><span>Chọn thông báo</span></label>
                    <span class="f-label ml-auto">Số ngày báo:</span><input type="text" value="4" class="f-input center !w-12 font-bold">
                </div>
            </div>

            <div class="tech-group">
                <span class="group-label">Hình ảnh người dùng (Vé tháng)</span>
                <label class="check-box"><input type="checkbox"><span>Hiển thị hình ảnh người đăng ký khi quét thẻ ra vào</span></label>
            </div>

            <div class="tech-group bg-yellow-50/50">
                <span class="group-label">Cập nhật thông tin tự động</span>
                <label class="check-box"><input type="checkbox"><span>Cập nhật tự động số lượng vào ra (2s/lần - chỉ máy con)</span></label>
            </div>

            <div class="tech-group">
                <span class="group-label">Ẩn thông tin IN OUT</span>
                <label class="check-box"><input type="checkbox"><span>Ẩn thông tin IN OUT trên màn hình</span></label>
            </div>

            <div class="tech-group border-transparent !bg-transparent !p-0 space-y-2 mt-4">
                <label class="check-box italic text-[11px]"><input type="checkbox"><span>Cập nhật vé lượt thành vé tháng (BS đã đăng ký)</span></label>
                <div class="grid grid-cols-1 gap-2">
                    <button class="btn-action w-full justify-center"><i class="fas fa-trash-alt"></i> XÓA DỮ LIỆU TRÙNG</button>
                    <button class="btn-action w-full justify-center"><i class="fas fa-print"></i> THÔNG TIN IN TRÊN BÁO CÁO</button>
                    <button class="btn-action btn-blue w-full justify-center font-bold text-sm h-10"><i class="fas fa-save"></i> LƯU CẤU HÌNH (SAVE)</button>
                </div>
            </div>
        </div>
    </div>
</div>
