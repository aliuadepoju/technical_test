<?php

namespace App\Helpers;

use App\User;

class Utility
{
    /**
     * Generate unique random api token for the user
     * @param User $user
     * @return bool|string
     */
    public function generateUniqueToken(User $user)
    {
        try {
            $token = hex2bin(random_bytes(32));
            $tokenExists = $user->whereApiToken($token)->first();

            if ($tokenExists) {
                return static::generateUniqueToken($user);
            }

            return $token;
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
        }
    }
}
