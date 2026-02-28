<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\ParkingTransaction;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ParkingController extends Controller
{
    /**
     * Xử lý xe VÀO bãi (Gate IN)
     * POST /api/vehicle-in
     */
    public function vehicleIn(Request $request)
    {
        $cardUid = $request->input('card_uid');
        $plate = $request->input('plate');
        $gateId = $request->input('gate_id');
        $imagePath = $request->input('image_path');
        $staffId = $request->input('staff_id');

        return DB::transaction(function () use ($cardUid, $plate, $gateId, $imagePath, $staffId) {
            // 1. Tìm thẻ qua UID
            $card = Card::where('card_uid', $cardUid)->first();
            if (!$card) {
                return response()->json(['success' => false, 'message' => 'THẺ CHƯA ĐĂNG KÝ!'], 404);
            }

            // 2. Kiểm tra trạng thái thẻ
            if ($card->status !== 'active') {
                return response()->json(['success' => false, 'message' => 'THẺ ĐANG BỊ KHÓA!'], 403);
            }

            // 3. CHỐNG TRÙNG SESSION (Quan trọng nhất - REQUIRE.txt)
            // Lock bản ghi giao dịch đang còn trạng thái 'in_park' của thẻ này
            $exists = ParkingTransaction::where('card_id', $card->id)
                ->where('status', 'in_park')
                ->lockForUpdate()
                ->first();

            if ($exists) {
                return response()->json([
                    'success' => false, 
                    'message' => 'THẺ ĐANG TRONG BÃI (Trùng lượt vào)!',
                    'data' => [
                        'time_in' => $exists->time_in,
                        'plate_in' => $exists->plate_in
                    ]
                ], 400);
            }

            // 4. Tạo phiên xe vào
            $transaction = new ParkingTransaction();
            $transaction->card_id = $card->id;
            $transaction->plate_in = $plate;
            $transaction->time_in = now();
            $transaction->image_in = $imagePath;
            $transaction->gate_in_id = $gateId;
            $transaction->staff_in_id = $staffId;
            $transaction->status = 'in_park';
            $transaction->save();

            return response()->json([
                'success' => true,
                'message' => 'MỜI XE VÀO BÃI',
                'data' => [
                    'card_type' => $card->card_type,
                    'time_in' => $transaction->time_in
                ]
            ]);
        });
    }

    /**
     * Xử lý xe RA bãi (Gate OUT)
     * POST /api/vehicle-out
     */
    public function vehicleOut(Request $request)
    {
        $cardUid = $request->input('card_uid');
        $plateOut = $request->input('plate');
        $gateId = $request->input('gate_id');
        $imagePath = $request->input('image_path');
        $staffId = $request->input('staff_id');

        return DB::transaction(function () use ($cardUid, $plateOut, $gateId, $imagePath, $staffId) {
            // 1. Tìm thẻ
            $card = Card::where('card_uid', $cardUid)->first();
            if (!$card) return response()->json(['success' => false, 'message' => 'THẺ LẠ!'], 404);

            // 2. Tìm phiên đang trong bãi và LOCK để tính tiền
            $transaction = ParkingTransaction::where('card_id', $card->id)
                ->where('status', 'in_park')
                ->lockForUpdate()
                ->first();

            if (!$transaction) {
                return response()->json(['success' => false, 'message' => 'XE CHƯA CÓ DỮ LIỆU VÀO!'], 400);
            }

            // 3. Tính tiền (Logic cơ bản, sẽ mở rộng theo bảng giá sau)
            $amount = 0;
            $cardTypes = Setting::get('card_types_json', []);
            $isCharge = false;
            
            // Tìm xem loại thẻ này có cấu hình tính tiền không
            foreach ($cardTypes as $type) {
                if ($type['code'] === $card->card_type && ($type['is_charge'] == '1' || $type['is_charge'] === true)) {
                    $isCharge = true;
                    break;
                }
            }

            if ($isCharge) {
                $amount = $this->calculateFee($transaction->time_in, now(), $card->card_type);
            }

            // 4. Cập nhật lượt ra
            $transaction->plate_out = $plateOut;
            $transaction->time_out = now();
            $transaction->image_out = $imagePath;
            $transaction->gate_out_id = $gateId;
            $transaction->staff_out_id = $staffId;
            $transaction->amount = $amount;
            $transaction->status = 'completed';
            $transaction->save();

            return response()->json([
                'success' => true,
                'message' => 'MỜI XE RA',
                'data' => [
                    'amount' => $amount,
                    'time_in' => $transaction->time_in,
                    'time_out' => $transaction->time_out,
                    'duration' => $transaction->time_in->diffInMinutes($transaction->time_out) . ' phút'
                ]
            ]);
        });
    }

    /**
     * Logic tính tiền dựa trên Settings
     */
    private function calculateFee($timeIn, $timeOut, $cardType)
    {
        // Tạm thời lấy giá mặc định từ settings hoặc hằng số
        // Sẽ được IT cấu hình chi tiết ở tab Giá Tiền sau
        $priceM1 = Setting::get('m1_price_xs', 5000);
        $priceM2 = Setting::get('m2_price_xs', 10000);
        
        // Demo: Nếu gửi qua đêm (>22h) thì lấy giá cao hơn
        $hourOut = Carbon::parse($timeOut)->hour;
        if ($hourOut >= 22 || $hourOut < 6) return $priceM2;
        
        return $priceM1;
    }
}
