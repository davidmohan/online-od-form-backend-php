<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../php/connect.php';
include_once './odform.php';
$database = new Database();

$db = $database->getConnection();
$items = new Od($db);

$items->id = $_GET['id'];

$items->getOdById();

echo json_encode($items);

?>