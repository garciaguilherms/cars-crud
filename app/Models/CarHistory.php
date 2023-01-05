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
        'name',
        'model',
        'year',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
