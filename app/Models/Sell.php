<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $table =  'sell';

    protected $fillable = [
        'user_id',
        'car_id'
    ];

    public function Users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function Car()
    {
        return $this->hasMany(Cars::class, 'id', 'car_id');
    }
}
