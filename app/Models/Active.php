<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $table = 'Active';
    public $timestamps = false;
    protected $primaryKey = 'sttthe';
    public $incrementing = false;

    protected $fillable = [
        'sttthe',
        'CardID',
        'trangthai',
    ];

    // Quan hệ với xe vào (1 Active có nhiều lần vào)
    public function vaos()
    {
        return $this->hasMany(Vao::class, 'STTThe', 'sttthe');
    }

    // Quan hệ với xe ra (1 Active có nhiều lần ra)
    public function ras()
    {
        return $this->hasMany(Ra::class, 'STTThe', 'sttthe');
    }

    // Quan hệ với thẻ tháng (1 Active có thể có 1 thông tin thẻ tháng)
    public function theThang()
    {
        return $this->hasOne(TheThang::class, 'SoTT', 'sttthe');
    }
}
