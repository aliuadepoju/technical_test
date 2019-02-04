<?php

namespace App\Helpers;

use App\PlateNumber;

class PlateNumberGenerator
{
    private static $suffixes = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Generate unique plate numbers
     * @param $lgaCode
     * @return mixed
     */
    public static function generate($lgaCode)
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
        $suffix = !is_null($lastPlateNumber) ? substr($lastPlateNumber['number'], -2) : 'AA';
        $plateNumber = $num . $suffix;

        // Handle when the plate number is at it's limit
        if ((int)$num > 999) {
            $lastPlateNumber = static::getLastPlateNumberArray($lgaCode);
            $firstChar = substr($lastPlateNumber['number'], -2, 1);
            $nextLastChar = static::getNextLastSuffixChar($lastPlateNumber['number']);
            $plateNumber = '001' . $firstChar . $nextLastChar;

            $lastPlateNumber = PlateNumber::whereNumber($lgaCode . $plateNumber)->first();
            if (!is_null($lastPlateNumber)) {
                $nextFirstChar = static::getNextFirstSuffixChar($firstChar);
                $plateNumber = '001' . $nextFirstChar . $nextLastChar;
            }
        }

        return $plateNumber;
    }

    /**
     * Get the next last suffix character
     * @param $number
     * @return mixed
     */
    private static function getNextLastSuffixChar($number)
    {
        $lastChar = substr($number, -1);
        $nextChar = array_search($lastChar, str_split(static::$suffixes)) + 1;
        if ($nextChar == strlen(static::$suffixes)) {
            $nextChar = 0;
        }
        return static::$suffixes[$nextChar];
    }

    /**
     * Get the next first suffix character
     * @param $lastFirstChar
     * @return mixed
     */
    private static function getNextFirstSuffixChar($lastFirstChar)
    {
        $nextChar = array_search($lastFirstChar, str_split(static::$suffixes)) + 1;
        if ($nextChar == strlen(static::$suffixes)) {
            $nextChar = 0;
        }
        return static::$suffixes[$nextChar];
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
