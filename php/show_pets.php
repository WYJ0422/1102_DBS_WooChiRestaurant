<?php
require("show.php");
require("openSession.php");

$response = [
    "status" => "fail",
];
$u_id=1;
$array = [] ;
$row = show::pets($u_id,$array);
//print_r($row);

if( $row ) {
    $response["status"] = "success";
    $response["data"] = $row ;
}
else {
    $response["error"] = "查無寵物資訊";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>
