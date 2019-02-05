<?php
namespace Api\Generate;

ini_set('display_errors', 0);

require "./Controller/Plates.php";
require "./Db/connections.php";
require "./Db/Db_connections.php";


use Api\Controller\Plates\Plates;

$plate = new Plates();

$lga = $_POST['lga'];
$number_of_plates = $_POST['number_of_plate'];

if($lga && $number_of_plates) {
    echo json_encode($plate->generate($lga, $number_of_plates));
}
else {
    echo [];
}