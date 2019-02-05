<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
namespace Api\Controller\Plates;

use Api\Db\Connections\Connections;

class Plates {
    public function __construct() {

    }

    /**
     * Generate the plate number with respect to the last number
     * in the database
     * 
     * @return String
     */

    public function generated_code($lga) {
        $connection = new Connections();

      return $connection->get_last_lga_plate_no($lga);
    }



    /**
     * Generate the plate number with respect to the last number
     * in the database
     * 
     * @return String
     */

    public function generate($lga, $number_of_plates) {
        $lastPlate = $this->generated_code($lga);
        $connection = new Connections();

        //array of generated plates
        $generatedPlates = [];

        //break the plate number to different category
        // $code = $lastPlate[0] . $lastPlate[1] . $lastPlate[2];

        if ($lastPlate != null) {
            $latest_number = $lastPlate[3] . $lastPlate[4] . $lastPlate[5];
            $latest_characters = $lastPlate[6] . $lastPlate[7] ;
        }
        else {
            $latest_number = "000";
            $latest_characters = "AA" ;
        }

        for ($i = 0; $i < $number_of_plates; $i++){

            //generate the 3 digit numbers and the last 2 alphabets
            $latest_number = $this->getActualNumber($latest_number, $latest_characters);

            $generated_plate_number = $lga . $latest_number;

            //add the generated number to the stack of numbers generated
            array_push($generatedPlates, $generated_plate_number);

            //populate database with value
            $connection->add_plate_no_to_db($lga, $generated_plate_number);
            
        }
        return $generatedPlates;
    }


    private function getActualNumber($present_number, $latest_characters) {
        if ($present_number >= 999) {
            return "001" . $this->increaseCharacter($latest_characters);
        }

        return str_pad($present_number + 1, 3, '0', STR_PAD_LEFT) . "" . (string)$latest_characters;
        // return $present_number + 1;
    }

    private function increaseCharacter($present_character) {
        //generate A to Z array
        $range = range("A", "Z");

        if ($present_character[1] == $range[25]) {
            return $range(array_search($_suffice[0], $range) + 1) . "A";
        }
        else {
            return $_suffice[0] . $range(array_search($_suffice[1], $range) + 1);
        }
    }
}