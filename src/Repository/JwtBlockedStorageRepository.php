<?php

namespace FatihOzpolat\JWTValidity\Repository;

use FatihOzpolat\JWTValidity\Models\JwtBlockedStorage;
use Carbon\Carbon;
use Tymon\JWTAuth\Contracts\Providers\Storage;

class JwtBlockedStorageRepository implements Storage
{
    protected JwtBlockedStorage $jwtBlockedStorageModel;

    /**
     * Varsayılan olarak vt modelini verir.
     *
     * @param JwtBlockedStorage $jwtBlockedStorageModel
     */
    public function __construct(JwtBlockedStorage $jwtBlockedStorageModel)
    {
        $this->jwtBlockedStorageModel = $jwtBlockedStorageModel;
    }

    /**
     * Token ekler
     *
     * @param string $key
     * @param mixed $value
     * @param int $minutes
     */
    public function add($key, $value, $minutes)
    {
        $expires_at = Carbon::now()->addMinutes($minutes)->toDateTimeString();
        $this->jwtBlockedStorageModel->newQuery()->create([
            'key' => $key,
            'value' => json_encode($value),
            'expires_at' => $expires_at
        ]);
    }

    /**
     * Süresiz token yaratır.
     *
     * @param string $key
     * @param mixed $value
     */
    public function forever($key, $value)
    {
        $this->jwtBlockedStorageModel->newQuery()
            ->create([
                'key' => $key,
                'value' => json_encode($value),
            ]);
    }

    /**
     * Süresi dolmayan son tokeni döner
     *
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        $now = Carbon::now();
        $data = $this->jwtBlockedStorageModel->newQuery()
            ->where('key', $key)
            ->where('expires_at', '>', $now)
            ->orderBy('expires_at', 'desc')
            ->first();
        if ($data) {
            return json_decode($data->value, true);
        } else {
            return null;
        }
    }

    public function destroy($key): bool
    {
        return !!$this->jwtBlockedStorageModel->newQuery()
            ->where('key', $key)
            ->delete();
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }
}