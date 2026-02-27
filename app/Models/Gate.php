<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'ip_address',
        'status',
    ];

    public function entries()
    {
        return $this->hasMany(ParkingTransaction::class, 'gate_in_id');
    }

    public function exits()
    {
        return $this->hasMany(ParkingTransaction::class, 'gate_out_id');
    }
}
