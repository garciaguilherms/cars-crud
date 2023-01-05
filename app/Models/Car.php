<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'name',
        'model',
        'year',
        'color',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {
        return $this->hasMany(CarHistory::class)->orderBy('created_at', 'desc');
    }

    public function insertHistory(): CarHistory
    {
        return CarHistory::firstOrCreate([
            'user_id' => $this->user_id,
            'car_id' => $this->id,
            'name' => $this->name,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,

        ]);
    }
}
