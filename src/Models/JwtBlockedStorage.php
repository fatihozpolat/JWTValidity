<?php

namespace FatihOzpolat\JWTValidity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JwtBlockedStorage extends Model
{
    use HasFactory;

    protected $table = 'jwt_blocked_storage';

    protected $fillable = [
        'key',
        'value',
        'expires_at',
    ];

    protected $dates = [
        'expires_at'
    ];
}
