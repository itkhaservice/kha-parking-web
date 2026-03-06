<div id="tab-hardware" class="tab-pane">
    <!-- HƯỚNG DẪN CẤU HÌNH NHANH -->
    <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 p-3 rounded-r shadow-sm">
        <div class="flex items-start">
            <div class="flex-shrink-0"><i class="fas fa-info-circle text-blue-500 mt-0.5"></i></div>
            <div class="ml-3">
                <h3 class="text-[11px] font-black text-blue-800 uppercase mb-1">Hướng dẫn cấu hình Camera (Snapshot)</h3>
                <div class="grid grid-cols-3 gap-4 text-[10px] text-blue-700 leading-relaxed">
                    <div>
                        <b class="text-blue-900"><i class="fas fa-video mr-1"></i> HIKVISION (DVR/IP):</b><br>
                        - Port mặc định: <code class="bg-white px-1">80</code><br>
                        - Kênh (CH): Kênh 1 nhập <code class="bg-white px-1">1</code> (Hệ thống tự chuyển thành 101).
                    </div>
                    <div>
                        <b class="text-blue-900"><i class="fas fa-video mr-1"></i> DAHUA / KBVISION:</b><br>
                        - Port mặc định: <code class="bg-white px-1">80</code><br>
                        - Kênh (CH): Kênh 1 nhập <code class="bg-white px-1">0</code> hoặc <code class="bg-white px-1">1</code> (Tùy đời đầu ghi).
                    </div>
                    <div>
                        <b class="text-blue-900"><i class="fas fa-network-wired mr-1"></i> CAMERA IP ĐỘC LẬP:</b><br>
                        - Mỗi camera là 1 IP riêng biệt.<br>
                        - Kênh (CH): Luôn nhập <code class="bg-white px-1">1</code>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        @php
            $lanes = config('cameras.lanes');
            $brands = config('cameras.brands');
        @endphp
        
        <!-- CỘT TRÁI: LÀN VÀO -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-[#108042]/30 shadow-sm relative pt-6">
                <span class="group-label !bg-[#108042] !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-in-alt mr-1"></i> Thiết bị Làn Vào
                </span>
                
                <div class="space-y-3 mb-4">
                    @foreach(['cam_in_plate', 'cam_in_view'] as $camKey)
                        @php $cam = $lanes[$camKey]; @endphp
                        <div class="bg-blue-50/50 p-2 rounded border border-blue-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="f-label text-blue-800 font-bold uppercase text-[10px]">{{ $cam['name'] }}:</span>
                                <div class="flex gap-2">
                                    <button type="button" onclick="previewCamera('{{ $camKey }}')" class="text-[9px] font-black text-blue-600 hover:underline"><i class="fas fa-eye"></i> XEM THỬ</button>
                                    <select name="{{ $camKey }}[brand]" class="f-input !h-5 !py-0 text-[9px] font-bold border-blue-200">
                                        @foreach($brands as $bKey => $bVal)
                                            <option value="{{ $bKey }}" {{ ($cam['brand'] ?? '') == $bKey ? 'selected' : '' }}>{{ strtoupper($bKey) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Nhập IP/CH cho DVR hoặc IP Camera -->
                            <div class="grid grid-cols-12 gap-1 mb-1">
                                <div class="col-span-12 flex items-center bg-white px-2 py-1 border border-blue-100 rounded mb-1">
                                    <span class="text-[9px] text-gray-500 mr-2 uppercase">Kết nối:</span>
                                    <input type="text" name="{{ $camKey }}[ip]" value="{{ $cam['ip'] ?? '' }}" class="flex-1 f-input !h-5 mono text-[10px] border-none !p-0" placeholder="Nhập IP Đầu ghi / Camera IP">
                                    <span class="text-[9px] text-gray-400 mx-2">:</span>
                                    <input type="text" name="{{ $camKey }}[port]" value="{{ $cam['port'] ?? '80' }}" class="w-10 f-input !h-5 center text-[10px] border-none !p-0" placeholder="80">
                                </div>
                                
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-blue-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">CH:</span>
                                    <input type="number" name="{{ $camKey }}[channel]" value="{{ $cam['channel'] ?? '1' }}" class="flex-1 f-input !h-5 center text-[10px] border-none !p-0 font-bold text-red-600" title="Kênh camera trên đầu ghi">
                                </div>
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-blue-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">User:</span>
                                    <input type="text" name="{{ $camKey }}[username]" value="{{ $cam['username'] ?? 'admin' }}" class="flex-1 f-input !h-5 text-[10px] border-none !p-0">
                                </div>
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-blue-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">Pass:</span>
                                    <input type="password" name="{{ $camKey }}[password]" value="{{ $cam['password'] ?? '' }}" class="flex-1 f-input !h-5 text-[10px] border-none !p-0">
                                </div>
                            </div>

                            <div id="preview_{{ $camKey }}" class="hidden mt-2 aspect-video bg-black rounded overflow-hidden relative border border-blue-300">
                                <img src="" class="w-full h-full object-contain">
                                <div class="absolute inset-0 flex items-center justify-center text-white text-[10px] bg-black/50 loading-text hidden">Đang tải ảnh...</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Đầu Đọc Thẻ (Vào)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="reader_in_com" value="{{ $settings['reader_in_com'] ?? 'COM5' }}" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" name="reader_in_baud" value="{{ $settings['reader_in_baud'] ?? '19200' }}" class="f-input center !w-16"></div>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Barrier (Vào)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" name="barrier_in_id" value="{{ $settings['barrier_in_id'] ?? '01' }}" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="barrier_in_conn" value="{{ $settings['barrier_in_conn'] ?? 'COM10' }}" class="f-input center !w-full text-[10px]"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI: LÀN RA -->
        <div class="space-y-6">
            <div class="tech-group bg-white !border-red-200 shadow-sm relative pt-6">
                <span class="group-label !bg-red-600 !text-white !font-black !px-3 !py-0.5 !top-[-10px] !left-3 rounded shadow-sm uppercase tracking-wider">
                    <i class="fas fa-sign-out-alt mr-1"></i> Thiết bị Làn Ra
                </span>
                
                <div class="space-y-3 mb-4">
                    @foreach(['cam_out_plate', 'cam_out_view'] as $camKey)
                        @php $cam = $lanes[$camKey]; @endphp
                        <div class="bg-red-50/50 p-2 rounded border border-red-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="f-label text-red-800 font-bold uppercase text-[10px]">{{ $cam['name'] }}:</span>
                                <div class="flex gap-2">
                                    <button type="button" onclick="previewCamera('{{ $camKey }}')" class="text-[9px] font-black text-red-600 hover:underline"><i class="fas fa-eye"></i> XEM THỬ</button>
                                    <select name="{{ $camKey }}[brand]" class="f-input !h-5 !py-0 text-[9px] font-bold border-red-200">
                                        @foreach($brands as $bKey => $bVal)
                                            <option value="{{ $bKey }}" {{ ($cam['brand'] ?? '') == $bKey ? 'selected' : '' }}>{{ strtoupper($bKey) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-1 mb-1">
                                <div class="col-span-12 flex items-center bg-white px-2 py-1 border border-red-100 rounded mb-1">
                                    <span class="text-[9px] text-gray-500 mr-2 uppercase">Kết nối:</span>
                                    <input type="text" name="{{ $camKey }}[ip]" value="{{ $cam['ip'] ?? '' }}" class="flex-1 f-input !h-5 mono text-[10px] border-none !p-0" placeholder="IP Đầu ghi / Camera IP">
                                    <span class="text-[9px] text-gray-400 mx-2">:</span>
                                    <input type="text" name="{{ $camKey }}[port]" value="{{ $cam['port'] ?? '80' }}" class="w-10 f-input !h-5 center text-[10px] border-none !p-0" placeholder="80">
                                </div>
                                
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-red-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">CH:</span>
                                    <input type="number" name="{{ $camKey }}[channel]" value="{{ $cam['channel'] ?? '1' }}" class="flex-1 f-input !h-5 center text-[10px] border-none !p-0 font-bold text-red-600" title="Kênh camera trên đầu ghi">
                                </div>
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-red-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">User:</span>
                                    <input type="text" name="{{ $camKey }}[username]" value="{{ $cam['username'] ?? 'admin' }}" class="flex-1 f-input !h-5 text-[10px] border-none !p-0">
                                </div>
                                <div class="col-span-4 flex items-center bg-white px-2 py-1 border border-red-100 rounded">
                                    <span class="text-[9px] text-gray-500 mr-2">Pass:</span>
                                    <input type="password" name="{{ $camKey }}[password]" value="{{ $cam['password'] ?? '' }}" class="flex-1 f-input !h-5 text-[10px] border-none !p-0">
                                </div>
                            </div>

                            <div id="preview_{{ $camKey }}" class="hidden mt-2 aspect-video bg-black rounded overflow-hidden relative border border-red-300">
                                <img src="" class="w-full h-full object-contain">
                                <div class="absolute inset-0 flex items-center justify-center text-white text-[10px] bg-black/50 loading-text hidden">Đang tải ảnh...</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-2 bg-emerald-50/30 border border-emerald-100 rounded">
                        <div class="text-[9px] font-black text-emerald-700 mb-2 uppercase underline">Đầu Đọc Thẻ (Ra)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="reader_out_com" value="{{ $settings['reader_out_com'] ?? 'COM8' }}" class="f-input center !w-16 font-bold text-emerald-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Baud:</span><input type="text" name="reader_out_baud" value="{{ $settings['reader_out_baud'] ?? '19200' }}" class="f-input center !w-16"></div>
                    </div>
                    <div class="p-2 bg-orange-50/30 border border-orange-100 rounded">
                        <div class="text-[9px] font-black text-orange-700 mb-2 uppercase underline">Barrier (Ra)</div>
                        <div class="f-row"><span class="f-label !w-12 text-[10px]">ID:</span><input type="text" name="barrier_out_id" value="{{ $settings['barrier_out_id'] ?? '02' }}" class="f-input center !w-16 font-bold text-orange-700"></div>
                        <div class="f-row mt-1"><span class="f-label !w-12 text-[10px]">Cổng:</span><input type="text" name="barrier_out_conn" value="{{ $settings['barrier_out_conn'] ?? 'COM11' }}" class="f-input center !w-full text-[10px]"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Final Action Row -->
    <div class="mt-6 flex justify-end gap-3">
        <button onclick="window.location.href='{{ route('dashboard.guard') }}'" class="btn-action !h-10 px-8 font-black uppercase tracking-widest border-gray-400">THOÁT</button>
        <button onclick="saveAllSettings()" class="btn-action btn-blue !h-10 px-12 font-black uppercase tracking-widest shadow-lg">LƯU CẤU HÌNH THIẾT BỊ</button>
    </div>
</div>

<script>
    function previewCamera(lane) {
        const previewDiv = document.getElementById('preview_' + lane);
        const img = previewDiv.querySelector('img');
        const loading = previewDiv.querySelector('.loading-text');

        previewDiv.classList.toggle('hidden');
        if (previewDiv.classList.contains('hidden')) return;

        loading.classList.remove('hidden');
        img.classList.add('hidden');
        
        // Gọi Proxy API
        const testUrl = `/api/camera/test/${lane}?t=` + new Date().getTime();
        
        img.src = testUrl;
        img.onload = () => {
            loading.classList.add('hidden');
            img.classList.remove('hidden');
        };
        img.onerror = () => {
            loading.innerText = '❌ LỖI: Camera Offline hoặc sai IP/User/Pass!';
            loading.classList.remove('hidden');
        };
    }
</script>
