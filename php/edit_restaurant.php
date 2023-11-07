<?php

require("database.php");
require("openSession.php");
$response = [
    "status" => "success"
];

$u_id = $_SESSION["id"];
$tel = $_REQUEST["tel"];
$mail = $_REQUEST["mail"];
$location = $_REQUEST["location"];
$hour = $_REQUEST["hour"];
$desc = $_REQUEST["desc"];

if($u_id==1){
    $sql=" UPDATE restaurant SET  phone='$tel' ,mail='$mail',location='$location',opening_hour='$hour',
           description='$desc' WHERE $u_id=1; ";
    $result =  database::$conn->query($sql);
    if( $result ) $response["status"] = "success";

}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


