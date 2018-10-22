<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/event.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare event object
$event = new Event($db);
 
// get id of event to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of event to be edited
$event->id = $data->id;
 

 
// set event property values
$event->organization_id = $data->organization_id;
$event->title = $data->title;
$event->description = $data->description;
$event->email = $data->email;
$event->phone = $data->phone;
$event->created = date('Y-m-d H:i:s');
 
// update the event
if($event->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "event was updated."));
}
 
// if unable to update the event, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update event."));
}
?>