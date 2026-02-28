<div id="tab-cards" class="tab-pane">
    <div class="tech-group">
        <span class="group-label">Quản lý Loại Thẻ</span>
        <div style="height: 180px; border: 1px solid #CCC; background: #FFF; overflow-y: auto; margin-bottom: 15px;">
            <table class="win-table w-full">
                <thead class="sticky top-0"><tr><th>Mã Thẻ</th><th>Tên Loại Thẻ</th><th class="text-center">Tính Tiền</th></tr></thead>
                <tbody><tr class="active"><td>VT</td><td>Vé tháng cư dân</td><td class="text-center">0</td></tr><tr><td>VT-XD</td><td>Vé tháng xe đạp</td><td class="text-center">0</td></tr></tbody>
            </table>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="f-row"><span class="f-label">Mã loại:</span><input type="text" class="f-input font-bold flex-1"></div>
            <div class="f-row"><span class="f-label">Diễn giải:</span><input type="text" class="f-input flex-1"></div>
        </div>
        <div class="flex justify-between items-center mt-4 pt-4 border-t border-dashed">
            <label class="check-box"><input type="checkbox"><span>Tính tiền vượt mức thời gian quy định</span></label>
            <div class="flex gap-2"><button class="btn-action"><i class="fas fa-edit"></i> Sửa</button><button class="btn-action btn-danger"><i class="fas fa-trash"></i> Xóa</button><button class="btn-action btn-blue"><i class="fas fa-plus"></i> Thêm mới</button></div>
        </div>
    </div>
</div>
