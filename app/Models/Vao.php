<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vao extends Model
{
    // Bảng trong database IDT
    protected $table = 'Vao';
    
    // SQL Server thường không dùng timestamps mặc định của Laravel
    public $timestamps = false;

    // Primary Key (STTThe theo phân tích của bạn)
    protected $primaryKey = 'STTThe';
    
    // Nếu STTThe không phải tự tăng (thường là vậy trong IDT)
    public $incrementing = false;

    protected $fillable = [
        'STTThe',
        'CardID',
        'NgayVao',
        'ThoiGian',
        'MaLoaiThe',
        'username',
        'IDXe',
        'IDMat',
        'cong',
        'loaithe',
        'soxe'
    ];

    /**
     * Chuyển đổi ThoiGian (số giây) sang định dạng H:i:s
     */
    public function getFormattedTimeAttribute()
    {
        if (!$this->ThoiGian) return '00:00:00';
        return gmdate("H:i:s", (int)$this->ThoiGian);
    }

    /**
     * Lấy đường dẫn ảnh biển số xe vào
     */
    public function getInPlateImageAttribute()
    {
        return $this->IDXe ? $this->IDXe . '.jpg' : null;
    }

    /**
     * Lấy đường dẫn ảnh toàn cảnh xe vào
     */
    public function getInPanoramaImageAttribute()
    {
        return $this->IDMat ? $this->IDMat . '.jpg' : null;
    }
}
