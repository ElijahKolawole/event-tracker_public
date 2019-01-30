<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../../../config/database.php';
include_once '../object.php';
 
$database = new Database();
$db = $database->getConnection();
 
$obj = new Obj($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set slot property values
$obj->id = $data->id;
 
// create the slot
if($obj->delete()){
    echo '{';
        echo '"message": "Slot was deleted"';
    echo '}';
}
 
// if unable to create the slot, tell the user
else{
    echo '{';
        echo '"message": "Unable to delete slot."';
    echo '}';
}
?>