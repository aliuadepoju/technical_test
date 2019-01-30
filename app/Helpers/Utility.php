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
    public static function generateUniqueToken(User $user)
    {
        try {
            // Generate the token
            $token = hex2bin(random_bytes(32));
            $tokenExists = $user->whereApiToken($token)->first();

            // Check if token already exists
            if ($tokenExists) {
                return static::generateUniqueToken($user);
            }

            return $token;
        } catch (\Exception $exception) {
            return static::generateUniqueToken($user);
        }
    }
}
