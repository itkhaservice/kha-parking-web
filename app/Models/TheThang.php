<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheThang extends Model
{
    protected $table = 'TheThang';
    public $timestamps = false;
    protected $primaryKey = 'SoTT'; // Khóa chính là SoTT
    public $incrementing = false;

    protected $fillable = [
        'CardID',
        'SoTT',
        'MaKH',
        'TTrang',
        'MaLoaiThe',
        'NgayBD',
        'NgayKT',
        'soxe',
        'nguoicap',
        'giatien',
        'datcoc',
    ];

    protected $dates = [
        'NgayBD',
        'NgayKT',
    ];

    // Quan hệ ngược về Active
    public function active()
    {
        return $this->belongsTo(Active::class, 'SoTT', 'sttthe');
    }

    public function getStatusLabelAttribute()
    {
        return $this->TTrang == 1 ? 'Đang sử dụng' : ($this->TTrang == 5 ? 'Đã khóa' : 'Khác');
    }
}
