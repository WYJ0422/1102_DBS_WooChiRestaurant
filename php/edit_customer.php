<?php

require("database.php");
require("openSession.php");

$response = [
    "status" => "success"
];

$u_id = $_SESSION["id"];
$account = $_REQUEST["account"];
$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$mail = $_REQUEST["mail"];

if($u_id!=1){
    $sql=" UPDATE customer SET c_name='$name', c_phone='$phone',c_mail='$mail' WHERE u_id='$u_id';" ;
    $result =  database::$conn->query($sql);
    $sql = "UPDATE users SET account='$account' WHERE u_id='$u_id'";
    database::$conn->query($sql);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


