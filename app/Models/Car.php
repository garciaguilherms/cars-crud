<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'model',
        'year',
        'color',
        'description',
        'user_id',
        'brand_id',
        'license_plate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {

        return $this->hasMany(CarHistory::class)->orderBy('created_at', 'desc');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function brandModel()
    {
        return $this->belongsTo(BrandModel::class);
    }

    public function insertHistory(): CarHistory
    {
        return CarHistory::firstOrCreate([
            'user_id' => $this->user_id,
            'car_id' => $this->id,
            'brand_id' => $this->brand_id,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'license_plate' => $this->license_plate,

        ]);
    }
}
