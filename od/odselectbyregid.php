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

// $body = json_decode(file_get_contents('php://input'));

// $items->regid = $body->regid;
$records = null;
$records = $items->getSingleStudentOd();
// $itemCount = $records->num_rows;
// echo json_encode($itemCount);
if($records != null){
  $odarr = array();
  // $odarr["odList"] = array();
  // $odarr["odCount"] = $itemCount;
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