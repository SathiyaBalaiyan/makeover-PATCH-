<?php
    
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PATCH");
    
    include_once '../config/database.php';
    include_once '../class/Deactivate.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Deactivate($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    $item->deactivate = $data->deactivate;
    
    if($item->updateDeactivate())
    {
        http_response_code(200);
        echo json_encode(["message" => "Deactivate status updated"]);
    } 
    else
    {
        http_response_code(400);
        echo json_encode(["message" => "Status could not be updated"]);
    }
?>