<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_uid',
        'card_type',
        'customer_id',
        'status',
        'expiry_date',
    ];

    protected $casts = [
        'expiry_date' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactions()
    {
        return $this->hasMany(ParkingTransaction::class);
    }
}
