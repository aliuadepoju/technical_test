<?php

namespace App\Helpers;

use App\PlateNumber;
use App\User;

class Utility
{
    private static $suffixes = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

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
        $prefixedNum = static::addNumberPrefix($lgaCode);
        $plateNumber = strtoupper($lgaCode) . $prefixedNum;

        return $plateNumber;
    }

    /**
     * Add number prefix
     * @param $lgaCode
     * @return string
     */
    private static function addNumberPrefix($lgaCode)
    {
        $plateNumberArray = static::getLastPlateNumberArray($lgaCode);
        $number = $plateNumberArray ? (int)substr($plateNumberArray['number'], 3, 3) + 1 : 1;

        if (strlen($number) == 1) {
            $number = '00' . $number;
        } elseif (strlen($number) == 2) {
            $number = '0' . $number;
        }

        return static::addNumberSuffix($number, $lgaCode);
    }

    /**
     * Add suffix to the plate number
     * @param $num
     * @param $lgaCode
     * @return mixed
     */
    private static function addNumberSuffix($num, $lgaCode)
    {
        $lastPlateNumber = static::getLastPlateNumberArray($lgaCode);
        $plateNumber = $num . substr($lastPlateNumber['number'], -2);

        if ((int)$num > 999) {
            $lastPlateNumber = static::getLastPlateNumberArray($lgaCode);
            $first = substr($lastPlateNumber['number'], -2, 1);
            $lastSuffix = static::getLastSuffix($lastPlateNumber['number']);
            $plateNumber = '001' . $first . $lastSuffix;

            $lastPlateNumber = PlateNumber::whereNumber($lgaCode . $plateNumber)->first();
            if (!is_null($lastPlateNumber)) {
                $lastSuffix = static::getLastSuffix($lastPlateNumber->number);
                $firstSuffix = static::$suffixes[array_search($first, str_split(static::$suffixes)) + 1];
                $plateNumber = '001' . $firstSuffix . $lastSuffix;
            }
        }

        return $plateNumber;
    }

    /**
     * Get last suffix
     * @param $number
     * @return mixed
     */
    private static function getLastSuffix($number)
    {
        $second = substr($number, -1);
        return static::$suffixes[array_search($second, str_split(static::$suffixes)) + 1];
    }

    /**
     * Get array data of the last plate number
     * @param $lgaCode
     * @return mixed
     */
    private static function getLastPlateNumberArray($lgaCode)
    {
        return collect(PlateNumber::whereCode($lgaCode)->get()->toArray())->last();
    }
}
