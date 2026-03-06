<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\Vao;
use App\Models\Ra;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\CameraService;

class ParkingController extends Controller
{
    protected $cameraService;

    public function __construct(CameraService $cameraService)
    {
        $this->cameraService = $cameraService;
    }

    /**
     * Xử lý xe VÀO bãi (Gate IN) - Logic IDT (GIUXE)
     * POST /api/vehicle-in
     */
    public function vehicleIn(Request $request)
    {
        $cardUid = $request->input('card_uid'); // Mã Hex từ đầu đọc
        $plate = $request->input('plate');
        
        // Tự động chụp ảnh từ Camera Làn Vào
        $capture = $this->cameraService->captureAndSave('entry_lane');
        $imagePath = $capture ? $capture['path'] : $request->input('image_path');

        return DB::transaction(function () use ($cardUid, $plate, $imagePath) {
            // 1. Tìm thẻ trong bảng Active
            $activeCard = Active::where('CardID', $cardUid)->first();

            if (!$activeCard) {
                return response()->json(['success' => false, 'message' => 'THẺ CHƯA ĐĂNG KÝ (Không tìm thấy trong Active)!'], 404);
            }

            // 2. Kiểm tra trạng thái thẻ
            // Giả sử: 0=Mất, 1=Vãng lai, 2=Thẻ tháng (đang sử dụng)
            // Cần xác nhận lại logic này với thực tế, nhưng tạm thời block thẻ mất (0)
            if ($activeCard->trangthai == 0) {
                return response()->json(['success' => false, 'message' => 'THẺ ĐÃ BÁO MẤT!'], 403);
            }

            // 3. CHỐNG TRÙNG (Logic IDT: Xe đã ở trong bãi thì không được vào nữa)
            // Kiểm tra trong bảng Vao xem có STTThe này chưa
            $exists = Vao::where('STTThe', $activeCard->sttthe)->first();

            if ($exists) {
                return response()->json([
                    'success' => false, 
                    'message' => 'XE ĐANG Ở TRONG BÃI (Trùng lượt vào)!',
                    'data' => [
                        'NgayVao' => $exists->NgayVao,
                        'soxe' => $exists->soxe
                    ]
                ], 400);
            }

            // 4. Lưu vào bảng Vao
            $now = Carbon::now();
            
            // Tính số giây trong ngày: (Giờ * 3600) + (Phút * 60) + Giây
            $thoiGian = ($now->hour * 3600) + ($now->minute * 60) + $now->second;
            
            $vao = new Vao();
            $vao->STTThe = $activeCard->sttthe;
            $vao->CardID = $cardUid;
            $vao->NgayVao = $now; // DateTime
            $vao->ThoiGian = $thoiGian; // Float (số giây)
            $vao->MaLoaiThe = ($activeCard->trangthai == 2) ? 'THANG' : 'VL'; // Tạm thời
            $vao->soxe = $plate;
            
            // Xử lý hình ảnh: Client gửi lên tên file (vd: 20221022...)
            // IDXe là ảnh biển số, IDMat là ảnh toàn cảnh
            // Tạm thời gán giống nhau hoặc xử lý tách chuỗi nếu client gửi format đặc biệt
            $vao->IDXe = $imagePath; 
            $vao->IDMat = $imagePath; 
            
            $vao->save();

            return response()->json([
                'success' => true,
                'message' => 'MỜI XE VÀO (Lưu bảng Vao thành công)',
                'data' => [
                    'sttthe' => $activeCard->sttthe,
                    'time_in' => $now->toDateTimeString()
                ]
            ]);
        });
    }

    /**
     * Xử lý xe RA bãi (Gate OUT) - Logic IDT (GIUXE)
     * POST /api/vehicle-out
     */
    public function vehicleOut(Request $request)
    {
        $cardUid = $request->input('card_uid');
        $plateOut = $request->input('plate');
        
        // Tự động chụp ảnh từ Camera Làn Ra
        $capture = $this->cameraService->captureAndSave('exit_lane');
        $imagePathOut = $capture ? $capture['path'] : $request->input('image_path');

        return DB::transaction(function () use ($cardUid, $plateOut, $imagePathOut) {
            // 1. Tìm thẻ trong Active để lấy STTThe
            $activeCard = Active::where('CardID', $cardUid)->first();
            if (!$activeCard) return response()->json(['success' => false, 'message' => 'THẺ LẠ (Không có trong Active)!'], 404);

            // 2. Tìm xe trong bảng Vao
            $xeVao = Vao::where('STTThe', $activeCard->sttthe)->first();

            if (!$xeVao) {
                return response()->json(['success' => false, 'message' => 'KHÔNG CÓ DỮ LIỆU XE VÀO!'], 400);
            }

            // 3. Tính tiền (Logic cơ bản)
            $now = Carbon::now();
            $thoiGianRa = ($now->hour * 3600) + ($now->minute * 60) + $now->second;
            
            $amount = 0;
            // Nếu là thẻ vãng lai (trangthai = 1) thì tính tiền
            if ($activeCard->trangthai == 1) {
                // TODO: Gọi hàm tính tiền chi tiết từ bảng BangGia sau
                $amount = 5000; // Giá mặc định demo
            }

            // 4. Lưu vào bảng Ra
            $ra = new Ra();
            $ra->STTThe = $activeCard->sttthe;
            $ra->CardID = $cardUid;
            $ra->NgayRa = $now;
            $ra->THoiGianRa = $thoiGianRa;
            $ra->MaLoaiThe = $xeVao->MaLoaiThe;
            $ra->GiaTien = $amount;
            
            // Thông tin lúc vào
            $ra->soxe = $xeVao->soxe; // Biển số lúc vào
            $ra->IDXe = $xeVao->IDXe; // Ảnh lúc vào (để đối chiếu)
            $ra->IDMat = $xeVao->IDMat;
            
            // Thông tin lúc ra
            $ra->soxera = $plateOut; // Biển số lúc ra
            // IDT thường lưu ảnh ra ở bảng Ra luôn hoặc bảng riêng, 
            // nhưng theo cấu trúc bảng Ra bạn đưa, có vẻ nó lưu lại thông tin phiên này.
            // Cần check lại xem IDT lưu ảnh ra ở đâu. Tạm thời lưu vào field IDXe/IDMat nếu bảng Ra dùng chung
            // Hoặc bảng Ra lưu ảnh vào để đối chiếu? 
            // Dựa trên check_table Ra: có IDXe, IDMat. Thường là ảnh lúc vào để hiển thị.
            // Ảnh lúc ra có thể được lưu tên file theo quy tắc thời gian ra, nhưng bảng Ra chưa thấy cột riêng cho ảnh ra (hoặc dùng cột khác?)
            
            $ra->save();

            // 5. XÓA khỏi bảng Vao (Quy trình chuẩn IDT: Xe ra là hết Vao)
            $xeVao->delete();

            return response()->json([
                'success' => true,
                'message' => 'MỜI XE RA (Đã chuyển sang bảng Ra)',
                'data' => [
                    'amount' => $amount,
                    'time_in' => $xeVao->NgayVao,
                    'time_out' => $now->toDateTimeString(),
                    'plate_in' => $xeVao->soxe,
                    'plate_out' => $plateOut
                ]
            ]);
        });
    }
}
