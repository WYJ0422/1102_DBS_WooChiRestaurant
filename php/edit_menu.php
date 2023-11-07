<?php

require("database.php");
require("openSession.php");
$response = [
    "status" => "success"
];

$u_id = $_SESSION["u_id"];

$i_id=1;
$content = $_REQUEST["content"];

if($u_id==1){
    $sql=" UPDATE images SET image='$content' WHERE i_id = '$i_id';";
    $result =  database::$conn->query($sql);// or die("select error");
    if( $result ) $response["status"] = "success";

}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


