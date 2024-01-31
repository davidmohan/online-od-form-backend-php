<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../php/connect.php';
include_once 'admin.php';

$database = new Database();
$db = $database->getConnection();
$item = new Admin($db);

$object=json_decode(file_get_contents('php://input'));

$item->name       =$object->name;
$item->regid      =$object->regid;
$item->password   =$object->password;
$item->conpass    =$object->conpass;
$item->designation=$object->designation;

if($item->createAdmin()) {
  $response["status"] = true;
  $response["key"] = 1;
  $response["message"] = "Admin User Created Successfully";
  echo json_encode($response);
} 
else{
  $response["status"] = false;
  $response["key"] = 0;
  $response["message"] = "Admin User Creation Failed";
  echo json_encode($response);
}
?>