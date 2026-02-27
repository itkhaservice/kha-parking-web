<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'apartment_number',
        'status',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
