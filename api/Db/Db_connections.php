<?php
    namespace Api\Db\Db_connections;

    class Db_connections {

        var $host = 'localhost';
        var $user = 'root';
        var $pass = 'jboy01';
        var $db = 'natview';
        var $myconn;

        private function dbconnect() {
            $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            if (!$con) {
                die('Could not connect to database!');
            } else {
                $this->myconn = $con;
                //echo 'Connection established!';
            }
            return $this->myconn;
        }

        function close() {
            mysqli_close($myconn);
            echo 'Connection closed!';
        }

        
        public function select_db() {
            mysqli_select_db($this->database, $this->handler) or $this->throw_error(mysqli_error(), __LINE__);
        }

        public function doSelect($query) {
            $this->dbconnect();

            $result = mysqli_query($this->myconn, $query);
            $grandvalue=[];
            $RecordCounter = 0;
            if(!mysqli_error($this->myconn) && mysqli_num_rows($result)) {

                if(mysqli_num_rows($result) > 0) {

                    // Make sure we get some rows back before we try to fetch them
                    while($row = mysqli_fetch_array($result)) {
                            $grandvalue[$RecordCounter]=$row;
                            $RecordCounter++;
                    }
                    return $grandvalue;
                }
                else {
                    return [];
                }
            }
            return [];

        }
        public function doInsert($query) {
            //echo $query;
            $this->dbconnect();

            $val=mysqli_query($this->myconn, $query);

        }

        public function doUpdate($query) {
        $this->dbconnect();

            $val=mysqli_query($this->myconn, $query);
        return $val;
        }

        public function doDelete($query) {
            $this->dbconnect();
            mysqli_query($this->myconn, $query);
        }


}