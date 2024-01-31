  <?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../php/connect.php';
include_once '../ad/admin.php';
$database = new Database();

$db = $database->getConnection();
$items = new Admin($db);
$records = $items->getAdmin();   
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if($itemCount > 0){
$userarr = array();
$userarr["userlist"] = array();
$userarr["userCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
array_push($userarr["userlist"], $row);
}
echo json_encode($userarr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>