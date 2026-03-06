<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ra extends Model
{
    protected $table = 'Ra';
    public $timestamps = false;
    protected $primaryKey = 'STTThe'; // Khóa chính là STTThe (hoặc có thể IDXe nếu duy nhất)
    public $incrementing = false;

    protected $fillable = [
        'STTThe',
        'CardID',
        'NgayRa',
        'THoiGianRa',
        'MaLoaiThe',
        'GiaTien',
        'username',
        'IDXe',
        'IDMat',
        'GioRa',
        'cong',
        'soxe',
        'soxera'
    ];

    public function getFormattedTimeOutAttribute()
    {
        if (!$this->THoiGianRa) return '00:00:00';
        return gmdate("H:i:s", (int)$this->THoiGianRa);
    }

    public function getOutPlateImageAttribute()
    {
        return $this->IDXe ? $this->IDXe . '.jpg' : null;
    }

    public function getOutPanoramaImageAttribute()
    {
        return $this->IDMat ? $this->IDMat . '.jpg' : null;
    }

    // Quan hệ ngược về Active
    public function active()
    {
        return $this->belongsTo(Active::class, 'STTThe', 'sttthe');
    }
}
