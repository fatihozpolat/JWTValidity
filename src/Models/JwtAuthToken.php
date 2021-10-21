<?php

namespace FatihOzpolat\JWTValidity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class JwtAuthToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'tokenable_id',
        'tokenable_type',
        'access_token',
        'ip_address',
        'user_agent',
    ];

    public function tokenable(): MorphTo
    {
        return $this->morphTo();
    }
}
