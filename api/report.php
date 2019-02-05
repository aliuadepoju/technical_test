<?php
namespace Api\Generate;

error_reporting(E_ALL); 
ini_set('display_errors', 1);

require "./Controller/Plates.php";
require "./Db/connections.php";
require "./Db/Db_connections.php";


use Api\Controller\Plates\Plates;
use Api\Db\Connections\Connections;

$conn = new Connections();

$from = $_POST['from'];
$to = $_POST['to'];

if ($from && $to) {
    echo json_encode($conn->get_plate_base_on_date($from, $to));
}
else {
    echo [];
}