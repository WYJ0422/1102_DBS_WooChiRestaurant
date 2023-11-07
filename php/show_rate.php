<?php

// 顯示所有評論
require("show.php");
require("openSession.php");
$response = [
    "status" => "success"
];
$array = [] ;

$row=show::rate($array); 
if( $row ) {
    $response["status"] = "success";
    $response["data"] = $row ;
}
else {
    $response["error"] = "找不到評論";
}
    
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


