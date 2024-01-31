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

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->regid = $_GET['regid'];
$item->name = $_GET['name'];
$item->password = $_GET['password'];
$item->designation = $_GET['designation'];

// $object=json_decode(file_get_contents('php://input'));

// $item->id = $object->id;
// $item->name       =$object->name;
// $item->regid      =$object->regid;
// $item->password   =$object->password;
// $item->designation=$object->designation;


if($item->updateAdmin()){
echo json_encode("User data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>