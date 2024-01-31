
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../php/connect.php';
include_once 'odform.php';

$database = new Database();
$db = $database->getConnection();
$item = new Od($db);

$item->id = $_GET['id'];

if($item->deleteOd())
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