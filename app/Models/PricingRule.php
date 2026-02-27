<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'price_per_hour',
        'price_overnight',
        'free_minutes',
        'description',
    ];
}
