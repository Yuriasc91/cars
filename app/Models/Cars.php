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
        'user_id',
        'year',
    ];

    public function User()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
