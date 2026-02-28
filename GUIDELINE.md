# 🅿️ KHA-PARKING: HƯỚNG DẪN KIẾN TRÚC & VẬN HÀNH

Tài liệu này ghi lại các quyết định kỹ thuật và quy trình vận hành cốt lõi của hệ thống Kha-Parking. Được thiết kế để đảm bảo tính sẵn sàng cao (High Availability) và dữ liệu đồng bộ tuyệt đối.

---

## 🏗 1. KIẾN TRÚC HỆ THỐNG (SINGLE DATABASE LOGIC)

Hệ thống hoạt động theo mô hình **Client-Server tập trung** nhưng có khả năng thay thế máy chủ linh hoạt.

- **Máy chủ (Primary):** Chứa SQL Server Active (ghi dữ liệu). Thường là máy Kế toán hoặc một máy riêng biệt.
- **Máy dự phòng (Mirror):** Chạy SQL Server ở chế độ Mirroring/Sync, sẵn sàng thay thế nếu máy chủ chết.
- **Máy trạm (Guard/Accountant):** Truy cập qua trình duyệt Web (Chrome/Edge) theo IP LAN.

### 🛑 Quy tắc "Vàng": Virtual Hostname
Không bao giờ dùng IP cứng trong code. Hệ thống kết nối tới database qua tên miền ảo: `parking-db`.
- **Cấu hình:** File `C:\Windows\System32\drivers\etc\hosts` trên mỗi máy phải có dòng:
  `[IP_MAY_CHU_HIEN_TAI]   parking-db`

---

## 💾 2. CƠ SỞ DỮ LIỆU (SQL SERVER)

- **Tên DB:** `kha_parking_db`
- **User/Pass:** `sa` / `123ABC`
- **Port:** `1433`
- **Đồng bộ:** Dữ liệu được sync Real-time giữa các máy A, B, C. Khi quẹt thẻ ở cổng này, cổng kia thấy dữ liệu ngay lập tức mà không cần F5.

---

## 🛡 3. LOGIC NGHIỆP VỤ QUAN TRỌNG

### 🚫 Chống trùng lượt (Double Scan)
Sử dụng `DB::transaction` kết hợp với `lockForUpdate()` trong Laravel.
- Khi thẻ quẹt vào, hệ thống "khóa" bản ghi đang ở trạng thái `in_park` của thẻ đó để kiểm tra.
- Đảm bảo 2 cổng không bao giờ tạo ra 2 lượt vào cùng lúc cho 1 thẻ (Lỗi phổ biến ở các hệ thống rẻ tiền).

### 📸 Hệ thống Camera đa nhiệm
- **Hỗ trợ:** Camera IP (RTSP) và Camera Analog (qua đầu ghi DVR - HTTP/Snapshot).
- **IT Setup:** Có nút "XEM THỬ" trong phần cài đặt phần cứng để test góc quay và kết nối trước khi bàn giao cho bảo vệ.

---

## 🚀 4. QUY TRÌNH XỬ LÝ SỰ CỐ (FAILOVER)

Khi máy chủ hiện tại bị hỏng, thực hiện 3 bước sau để bãi xe chạy tiếp:

1. **Xác định máy thay thế:** Chọn Máy A hoặc C đang có dữ liệu Mirror mới nhất.
2. **Kích hoạt Database:** Chuyển SQL Server trên máy đó từ trạng thái `Mirror` sang `Active/Principal`.
3. **Cập nhật IP ảo:** Sửa file `hosts` trên tất cả các máy trạm, trỏ `parking-db` về IP của máy chủ mới này.
4. **Khởi động:** Chạy file `Kha-Parking-Start.bat` trên máy mới.

---

## 🛠 5. QUY TRÌNH CÀI ĐẶT TRÊN MÁY MỚI (FRESH INSTALL)

Khi bạn nén project này mang sang một máy tính mới hoàn toàn, hãy thực hiện theo các bước sau:

### Bước 1: Chuẩn bị SQL Server
- Cài đặt **Microsoft SQL Server** (Express hoặc Standard).
- Tạo một Database trống tên là: `kha_parking_db`.
- Đảm bảo tài khoản `sa` có mật khẩu là `123ABC` (hoặc cấu hình lại trong `.env` sau khi cài đặt).

### Bước 2: Chạy Setup tự động
- Chuột phải vào file `SETUP-MAY-MOI.bat` -> Chọn **Run as Administrator**.
- Script sẽ tự động:
    1. Giải nén bộ **PHP 8.2 Portable** tích hợp sẵn.
    2. Cấu hình IP ảo `parking-db` vào file `hosts` của Windows.
    3. Khởi tạo file `.env` và mã bảo mật `APP_KEY`.
    4. Hỏi bạn có muốn chạy `Migrate --seed` để tạo bảng và tài khoản Admin hay không (Chọn **Y** nếu đây là máy chủ).

### Bước 3: Vận hành
- Chạy file `Kha-Parking-Start.bat` để bắt đầu.
- Truy cập: `http://localhost:8000` (trên máy chủ) hoặc `http://[IP_LAN]:8000` (trên máy trạm).

---

## 🛠 6. CÔNG CỤ HỖ TRỢ (LAUNCHER)

- **`Kha-Parking-Start.bat`:** Tự động lấy IP LAN, khởi động PHP Server và Vite ở chế độ ẩn. Hiển thị link truy cập cho các máy khác.
- **`Kha-Parking-Stop.bat`:** Tắt nhanh toàn bộ dịch vụ ngầm để bảo trì.
- **`package.json`:** Đã cấu hình `--host 0.0.0.0` để các máy khác tải được giao diện (CSS/JS).

---

## 📝 6. LƯU Ý CHO DEVELOPER / IT

- **Cài đặt:** Chạy `php artisan migrate --seed` lần đầu để tạo bảng và tài khoản Admin.
- **Giao diện:** Đã tối ưu nạp tài nguyên Offline (Tailwind/FontAwesome) để không bị treo khi mạng LAN không có internet.
- **Thời gian chờ:** DB Timeout được đặt là 2 giây để tránh treo trang khi mất kết nối máy chủ.

*Cập nhật lần cuối: 28/02/2026 bởi Gemini CLI*
