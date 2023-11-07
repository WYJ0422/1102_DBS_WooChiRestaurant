<?php
require("show.php");
require("openSession.php");

$response = [
    "status" => "fail",
];
$array=[];


$u_id=$_SESSION["id"];

if( $row=show::order($u_id,$array) ) {
    $response["status"] = "success";
    $response["data_order"] = $row ;
}
else {
    $response["error"] = "查無訂單";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
	
?>
