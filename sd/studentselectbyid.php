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

$body = json_decode(file_get_contents('php://input'));

$item->regid = $body->regid;
$item->password = $body->password;

$item->getSingleStudent();

// $user_arr = array(
//   "regid" => $item->regid,
//   "password" => $item->password
//   );

if($item->regid != null){
  if($item->regid == $body->regid && $item->password == $body->password) {
    $res['name'] = $item->name;
    $res['regid'] = $item->regid;
    $res['password'] = $item->password;
    $res['status'] = true;
    echo json_encode($res);
  } else {
    $res['status'] = false;
    echo json_encode($res);
  }
}
else{
  $res['status'] = false;
    echo json_encode($res);
}
?>