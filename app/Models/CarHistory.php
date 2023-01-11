<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CarHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'brand_model_id',
        'year',
        'color',
        'brand_id',
        'license_plate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
