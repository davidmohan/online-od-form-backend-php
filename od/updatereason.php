<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../php/connect.php';
include_once 'odform.php';

$database = new Database();
$db = $database->getConnection();
$item = new Od($db);

$body=json_decode(file_get_contents('php://input'));

$item->id = $body->id;
$item->reason = $body->message;

if($item->updateReason()){
  $item->key = true;
  echo json_encode($item);
} 
else{
  $item->key = false;
  echo json_encode($item);
}
?>