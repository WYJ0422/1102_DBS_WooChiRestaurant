<?php
require("show.php");
require("openSession.php");
$u_id=1;
$response = [
    "status" => "fail",
];
if( $row=show::restaurant($u_id)) {
    $response["status"] = "success";
    $response["data"] = $row ;
}
else {
    $response["error"] = "查無店家資料";
}
//print_r($row);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
	
?>
