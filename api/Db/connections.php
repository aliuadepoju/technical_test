<?php
    namespace Api\Db\Connections;

    use Api\Db\Db_connections\Db_connections;

    class Connections {

        /**
         * 
         */
        public function __construct(){

        }
        
        public function get_last_lga_plate_no($lga){

            $connection =  new Db_connections();
            $result = $connection->doSelect(
                "SELECT * FROM `plates` WHERE `lga` = '$lga' ORDER BY `id` DESC"
            );

            if(sizeof($result) > 0) {
                return $result[0]['plate_no'];
            }

            return null;
        }

        public function add_plate_no_to_db($lga, $plate_no) {
            $connection =  new Db_connections();
            $result = $connection->doInsert(
                "INSERT INTO `plates` (lga, plate_no) VALUES ('$lga', '$plate_no')"
            );
        }

        public function get_plate_base_on_date($from, $to) {

            $connection =  new Db_connections();

            return $connection->doSelect(
                "SELECT * FROM `plates` WHERE plates.date >= '$from' AND plates.date < '$to' ORDER BY `id` DESC"
                // "SELECT * FROM `plates` WHERE plates.date >= '2019-02-04' AND plates.date < '2019-02-06' ORDER BY `id` DESC"
            );

        }

}