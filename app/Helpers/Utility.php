<?php

namespace App\Helpers;

use App\PlateNumber;
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
            $token = bin2hex(random_bytes(32));
            $tokenExists = $user->whereApiToken($token)->first();

            // Check if token already exists
            if (!is_null($tokenExists)) {
                return static::generateUniqueToken($user);
            }

            return $token;
        } catch (\Exception $exception) {
            return static::generateUniqueToken($user);
        }
    }

    /**
     * Get LGA name by code
     * @param $code
     * @return string
     */
    public static function getLgaName($code)
    {
        switch ($code) {
            case 'ABJ':
                return 'Abaji';
                break;
            case 'ABC':
                return 'Abuja Municipal';
                break;
            case 'GWA':
                return 'Gwagwalada';
                break;
            case 'KUJ':
                return 'Kuje';
                break;
            case 'BWR':
                return 'Bwari';
                break;
            case 'KWL':
                return 'Kwali';
                break;
        }
    }

    /**
     * Generate unique plate numbers
     * @param $lgaCode
     * @return mixed
     */
    public static function generatePlateNumber($lgaCode)
    {
        $number = PlateNumber::whereCode($lgaCode)->count();
        $prefixedNum = static::addNumberPrefix($number, $lgaCode);
        $plateNumber = strtoupper($lgaCode) . $prefixedNum;

        return $plateNumber;
    }

    /**
     * Add number prefix
     * @param $num
     * @param $lgaCode
     * @return string
     */
    private static function addNumberPrefix($num, $lgaCode)
    {
        $num += 1;
        if (strlen($num) == 1) {
            $num = '00' . $num;
        } elseif (strlen($num) == 2) {
            $num = '0' . $num;
        }

        return static::addNumberSuffix($num, $lgaCode);
    }

    /**
     * Add suffix to the plate number
     * @param $num
     * @param $lgaCode
     * @return mixed
     */
    private static function addNumberSuffix($num, $lgaCode)
    {
        $suffixes = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $plateNumber = $num . $suffixes[0] . $suffixes[0];
        $lastPlateNumber = collect(PlateNumber::whereCode($lgaCode)->get()->toArray())->last();

        if (!is_null($lastPlateNumber)) {
            if (strlen($num) > 3 && (int)$num == 1000) {
                $first = substr($lastPlateNumber['number'], -2, 1);
                $second = substr($lastPlateNumber['number'], -1);
                $lastSuffix = $suffixes[array_search($second, str_split($suffixes)) + 1];
                $plateNumber = '001' . $first . $lastSuffix;

                if (!is_null(PlateNumber::whereNumber($lgaCode . $plateNumber)->first())) {
                    $firstSuffix = $suffixes[array_search($first, str_split($suffixes)) + 1];
                    $plateNumber = '001' . $firstSuffix . $lastSuffix;
                }

            }
        }

        return $plateNumber;
    }
}
