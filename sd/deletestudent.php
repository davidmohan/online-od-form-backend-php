
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

include_once '../php/connect.php';
include_once 'student.php';

$database = new Database();
$db = $database->getConnection();
$item = new Student($db);

$item->regid = $_GET['regid'];

if($item->deleteStudent())
{
  $res['status'] = true;
  echo json_encode($res);
} 
else
{
  $res['status'] = false;
  echo json_encode($res);
}
?>