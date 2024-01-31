<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../php/connect.php';
include_once './student.php';
$database = new Database();

$db = $database->getConnection();
$items = new Student($db);

$items->regid = $_GET['regid'];

$items->singleStudent();

echo json_encode($items);

?>