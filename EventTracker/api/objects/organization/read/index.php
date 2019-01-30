<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../../config/database.php';
include_once '../object.php';
 
// instantiate database and slot object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$obj = new Obj($db);
// if specific slot ID requested then show one slot
if(isset($_GET['id'])){
    $query = $obj->readFromId($_GET['id']);

} elseif(isset($_GET['event'])) {

    // query slots
    $query = $obj->readFromEvent($_GET['event']);

} elseif(isset($_GET['page'])){

    // count per page
    $count = isset($_GET['count']) ? $_GET['count'] : 10;

    // query slots
    $query = $obj->readPaging($_GET['page'],intval($count)); 

} else {
    // query slots
    $query = $obj->read(); 
}
echo json_encode($query);
?>