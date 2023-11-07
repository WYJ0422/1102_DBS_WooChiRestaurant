<?php

require("show.php");
require("openSession.php");

$response = [
    "status" => "fail",
];
$array=[];

if( $row=show::menu($array) ) {
    $response["status"] = "success";
    $response["data"] = $row ;
}
else {
    $response["error"] = "查無菜單";
}
//print_r($row);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
	
?>
