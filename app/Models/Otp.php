<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'otp',
        'is_verified',
        'expired_at',
        'user_id'
    ];

    protected $casts = [
        'expired_at' => 'datetime'
    ];

    protected $table = 'otps';
}
