<div id="tab-cards" class="tab-pane">
    <div class="grid grid-cols-1 gap-6">
        <div class="tech-group bg-white !border-[#108042]/30 shadow-sm relative pt-6">
            <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                <i class="fas fa-id-card mr-1"></i> Định nghĩa Loại Thẻ & Nhóm Đối Tượng
            </span>

            <div class="flex gap-6">
                <!-- Danh sách bên trái -->
                <div class="flex-1">
                    <div class="border border-gray-300 rounded overflow-hidden">
                        <table class="win-table w-full" id="table-card-types">
                            <thead>
                                <tr>
                                    <th class="!bg-gray-100">Mã Loại</th>
                                    <th class="!bg-gray-100">Diễn giải / Tên nhóm</th>
                                    <th class="!bg-gray-100 text-center">Tính tiền</th>
                                    <th class="!bg-gray-100 text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="card-type-list">
                                <tr class="cursor-pointer hover:bg-green-50" onclick="editCardRow(this)">
                                    <td class="font-black text-blue-700">VT</td>
                                    <td class="font-bold">Vé tháng cư dân</td>
                                    <td class="text-center font-black">0</td>
                                    <td class="text-center"><button class="text-red-500 hover:text-red-700" onclick="deleteCardRow(this, event)"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                <tr class="cursor-pointer hover:bg-green-50" onclick="editCardRow(this)">
                                    <td class="font-black text-blue-700">VT-XD</td>
                                    <td class="font-bold">Vé tháng xe đạp</td>
                                    <td class="text-center font-black">0</td>
                                    <td class="text-center"><button class="text-red-500 hover:text-red-700" onclick="deleteCardRow(this, event)"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                                <tr class="cursor-pointer hover:bg-green-50" onclick="editCardRow(this)">
                                    <td class="font-black text-blue-700">VL</td>
                                    <td class="font-bold">Vé lượt vãng lai</td>
                                    <td class="text-center font-black text-red-600">1</td>
                                    <td class="text-center"><button class="text-red-500 hover:text-red-700" onclick="deleteCardRow(this, event)"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 text-[9px] text-gray-400 italic">* Click vào dòng để chỉnh sửa thông tin phía dưới</div>
                </div>

                <!-- Form nhập bên phải -->
                <div class="w-80 bg-gray-50 p-4 rounded border border-gray-200 shadow-inner">
                    <div class="text-[10px] font-black text-gray-500 uppercase mb-4 border-b border-gray-300 pb-1">Chi tiết Loại thẻ</div>
                    <div class="space-y-4">
                        <div class="f-row flex-col !items-start">
                            <span class="f-label !text-[10px] text-gray-500 uppercase mb-1">Mã loại (Code):</span>
                            <input type="text" id="card_code" class="f-input !w-full font-black text-blue-700 text-sm h-8 uppercase">
                        </div>
                        <div class="f-row flex-col !items-start">
                            <span class="f-label !text-[10px] text-gray-500 uppercase mb-1">Diễn giải:</span>
                            <input type="text" id="card_desc" class="f-input !w-full font-bold h-8">
                        </div>
                        <div class="flex items-center justify-between bg-white p-2 rounded border border-gray-200 mt-2">
                            <span class="text-[11px] font-bold text-gray-700">Kích hoạt tính tiền:</span>
                            <label class="check-box !mb-0"><input type="checkbox" id="card_is_charge" class="w-4 h-4 accent-[#108042]"></label>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-4">
                            <button onclick="clearCardForm()" class="btn-action justify-center h-10 border-gray-300 text-gray-500 font-bold">LÀM MỚI</button>
                            <button onclick="addOrUpdateCard()" class="btn-action btn-blue justify-center h-10 font-black">CẬP NHẬT</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Global Card Settings -->
            <div class="mt-8 pt-6 border-t border-dashed border-gray-300">
                <div class="grid grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="check-box bg-white p-3 border border-gray-200 rounded shadow-sm hover:border-[#108042] transition-all cursor-pointer">
                            <input type="checkbox" name="card_limit_time" checked class="w-5 h-5 accent-[#108042]">
                            <div class="ml-3">
                                <div class="text-[11px] font-black text-gray-800 uppercase">Tính tiền vượt thời gian quy định</div>
                                <div class="text-[9px] text-gray-500">Tự động áp dụng giá vé lượt khi vé tháng hết hạn hoặc gửi quá giờ.</div>
                            </div>
                        </label>
                        <label class="check-box bg-white p-3 border border-gray-200 rounded shadow-sm hover:border-[#108042] transition-all cursor-pointer">
                            <input type="checkbox" name="card_auto_lock" class="w-5 h-5 accent-[#108042]">
                            <div class="ml-3">
                                <div class="text-[11px] font-black text-gray-800 uppercase">Tự động khóa thẻ sau 30 ngày không sử dụng</div>
                                <div class="text-[9px] text-gray-500">Giúp bảo mật và dọn dẹp danh sách thẻ rác trong hệ thống.</div>
                            </div>
                        </label>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded border border-blue-100">
                        <div class="text-[10px] font-black text-blue-700 uppercase mb-2"><i class="fas fa-info-circle mr-1"></i> Quy tắc Thẻ hệ thống</div>
                        <p class="text-[10px] text-blue-800 leading-relaxed italic">
                            - <strong>Vé Tháng (VT):</strong> Không tính tiền tại làn, quản lý theo chu kỳ tháng. <br>
                            - <strong>Vé Lượt (VL):</strong> Tính tiền trực tiếp khi xe ra dựa trên bảng giá. <br>
                            - <strong>Ưu tiên:</strong> Các loại thẻ VIP/Nhân viên có thể cài đặt phí = 0.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nút lưu ẩn để JS thu thập dữ liệu danh sách -->
    <input type="hidden" name="card_types_json" id="card_types_json">

    <div class="mt-6 flex justify-end gap-3">
        <button onclick="window.location.href='{{ route('dashboard.guard') }}'" class="btn-action !h-10 px-8 font-black uppercase tracking-widest border-gray-400">THOÁT</button>
        <button onclick="saveAllSettings()" class="btn-action btn-blue !h-10 px-12 font-black uppercase tracking-widest shadow-lg">LƯU CẤU HÌNH LOẠI THẺ</button>
    </div>
</div>

<script>
    let editingRow = null;

    function clearCardForm() {
        document.getElementById('card_code').value = '';
        document.getElementById('card_desc').value = '';
        document.getElementById('card_is_charge').checked = false;
        editingRow = null;
        
        // Reset row highlights
        document.querySelectorAll('#card-type-list tr').forEach(tr => tr.classList.remove('active', 'bg-green-50'));
    }

    function editCardRow(row) {
        editingRow = row;
        
        // Highlight row
        document.querySelectorAll('#card-type-list tr').forEach(tr => tr.classList.remove('active', 'bg-green-50'));
        row.classList.add('active', 'bg-green-50');

        const cells = row.getElementsByTagName('td');
        document.getElementById('card_code').value = cells[0].innerText;
        document.getElementById('card_desc').value = cells[1].innerText;
        document.getElementById('card_is_charge').checked = cells[2].innerText === '1';
    }

    function deleteCardRow(btn, event) {
        event.stopPropagation();
        if(confirm('Bạn có chắc muốn xóa loại thẻ này?')) {
            btn.closest('tr').remove();
            updateCardJson();
        }
    }

    function addOrUpdateCard() {
        const code = document.getElementById('card_code').value.trim().toUpperCase();
        const desc = document.getElementById('card_desc').value.trim();
        const isCharge = document.getElementById('card_is_charge').checked ? '1' : '0';

        if(!code || !desc) {
            alert('Vui lòng nhập đầy đủ Mã và Diễn giải!');
            return;
        }

        if(editingRow) {
            // Update
            const cells = editingRow.getElementsByTagName('td');
            cells[0].innerText = code;
            cells[1].innerText = desc;
            cells[2].innerText = isCharge;
            cells[2].className = isCharge === '1' ? 'text-center font-black text-red-600' : 'text-center font-black';
        } else {
            // Add new
            const tbody = document.getElementById('card-type-list');
            const newRow = document.createElement('tr');
            newRow.className = 'cursor-pointer hover:bg-green-50';
            newRow.onclick = function() { editCardRow(this); };
            newRow.innerHTML = `
                <td class="font-black text-blue-700">${code}</td>
                <td class="font-bold">${desc}</td>
                <td class="text-center font-black ${isCharge === '1' ? 'text-red-600' : ''}">${isCharge}</td>
                <td class="text-center"><button class="text-red-500 hover:text-red-700" onclick="deleteCardRow(this, event)"><i class="fas fa-trash-alt"></i></button></td>
            `;
            tbody.appendChild(newRow);
        }

        updateCardJson();
        clearCardForm();
    }

    function updateCardJson() {
        const data = [];
        const rows = document.querySelectorAll('#card-type-list tr');
        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            data.push({
                code: cells[0].innerText,
                name: cells[1].innerText,
                is_charge: cells[2].innerText
            });
        });
        document.getElementById('card_types_json').value = JSON.stringify(data);
    }

    // Khởi tạo JSON lần đầu
    window.addEventListener('DOMContentLoaded', updateCardJson);
</script>
