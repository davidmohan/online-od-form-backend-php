<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../php/connect.php';
include_once './student.php';

$database = new Database();
$db = $database->getConnection();
$item = new Student($db);

$body=file_get_contents('php://input');
//echo $body;

$object=json_decode($body);
//echo $object->name;
$item->name     =$object->name;
$item->regid    =$object->regid;
$item->class    =$object->class;
$item->sec      =$object->sec;
$item->mobileno =$object->mobileno;
$item->anotherno=$object->anotherno;
$item->email    =$object->email;
$item->password =$object->password;

if($item->createStudent()){
  $res['status'] = true;
  echo json_encode($res);
} 
else{
  $res['status'] = false;
  echo json_encode($res);
}
?>