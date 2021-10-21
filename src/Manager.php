<?php

namespace FatihOzpolat\JWTValidity;

use FatihOzpolat\JWTValidity\Models\JwtAuthToken;
use Tymon\JWTAuth\Facades\JWTAuth;


class Manager
{
    /**
     * Verilen tokeni jwt_auth_tokens tablosuna ekler.
     * @param $token
     */
    public static function addToken($token): void
    {
        auth()->user()->tokens()->create([
            'access_token' => $token,
            'ip_address' => $_SERVER["HTTP_CF_CONNECTING_IP"] ?? $_SERVER["REMOTE_ADDR"],
            'user_agent' => $_SERVER["HTTP_USER_AGENT"],
        ]);
    }

    /**
     * Verilen tokeni jwt_auth_tokens tablosundan siler.
     * @param $token
     */
    public static function removeToken($token): void
    {
        JwtAuthToken::where('access_token', $token)->delete();
    }

    /**
     * Kullanıcıya ait tüm tokenleri engeller.
     *
     * @param $model
     * @return bool
     */
    public static function blockTokens($model): bool
    {
        if ($model->tokens->count()) {
            foreach ($model->tokens as $token) {
                JWTAuth::setToken($token->access_token)->invalidate();
                $token->delete();
            }
            return true;
        }
        return false;
    }
}