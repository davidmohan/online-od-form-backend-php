<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../php/connect.php';
include_once './student.php';
$database = new Database();

$db = $database->getConnection();
$items = new Student($db);
$records = null;
$records = $items->getStudent();   
// $itemCount = $records->num_rows;
// echo json_encode($itemCount);
if($records != null){
$userarr = array();
// $userarr["userlist"] = array();
// $userarr["userCount"] = $itemCount;
$row = array();
while ($row = $records->fetch_assoc())
{
array_push($userarr, $row);
}
echo json_encode($userarr);
}
?>