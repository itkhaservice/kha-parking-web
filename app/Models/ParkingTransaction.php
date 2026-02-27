<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'vehicle_id',
        'plate_in',
        'plate_out',
        'time_in',
        'time_out',
        'image_in',
        'image_out',
        'gate_in_id',
        'gate_out_id',
        'staff_in_id',
        'staff_out_id',
        'amount',
        'status',
    ];

    protected $casts = [
        'time_in' => 'datetime',
        'time_out' => 'datetime',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function gateIn()
    {
        return $this->belongsTo(Gate::class, 'gate_in_id');
    }

    public function gateOut()
    {
        return $this->belongsTo(Gate::class, 'gate_out_id');
    }

    public function staffIn()
    {
        return $this->belongsTo(User::class, 'staff_in_id');
    }

    public function staffOut()
    {
        return $this->belongsTo(User::class, 'staff_out_id');
    }
}
