<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include_once '../php/connect.php';
include_once './odform.php';
$database = new Database();

$db = $database->getConnection();
$items = new Od($db);

$items->id = $_GET['id'];

if($items->denyOd()) {
  $res['key'] = true;
  echo json_encode($res);
} else {
  $res['key'] = false;
  echo json_encode($res);
}
?>