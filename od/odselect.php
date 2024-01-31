<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../php/connect.php';
include_once './odform.php';
$database = new Database();

$db = $database->getConnection();
$items = new Od($db);
$records = null;
$records = $items->getOd();
// $itemCount = $records->num_rows;
// echo json_encode($itemCount);
if($records != null){
$odarr = array();
// $odarr["odlist"] = array();
// $odarr["odCount"] = $itemCount;
$row = array();
while ($row = $records->fetch_assoc())
{
array_push($odarr, $row);
}
echo json_encode($odarr);
}
?>