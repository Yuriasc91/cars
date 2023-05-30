<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'modelo',
        'year',
        'price',
        'sell_id',
    ];

    public function Sell()
    {
        return $this->belongsTo(Sell::class, 'car_id', 'id');
    }
}
