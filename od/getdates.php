<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include_once '../php/connect.php';
include_once './odform.php';
$database = new Database();

$db = $database->getConnection();
$items = new Od($db);

$items->regid = $_GET['regid'];

$records = null;

$records = $items->getDates();

if($records != null){
  $odarr = array();
  $row = array();
  while ($row = $records->fetch_assoc())
  {
    array_push($odarr, $row);
  }
    echo json_encode($odarr);
}
//   }
//   else {
//     $odarr['response'] = false;
//     echo json_encode($odarr);
// }
 ?>