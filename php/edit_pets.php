<?php

require("database.php");
require("openSession.php");
$response = [
    "status" => "success"
];

$u_id = $_SESSION["u_id"];
$p_id=1;

$p_name = $_REQUEST["p_name"];
$photo = $_REQUEST["photo"];
$gender = $_REQUEST["gender"];
$age = $_REQUEST["age"];
$size = $_REQUEST["size"];
$v = $_REQUEST["v"];
$desc = $_REQUEST["desc"];
$m = $_REQUEST["m"];
$l = $_REQUEST["l"];
$type= $_REQUEST["type"];


if($u_id==1){
    $sql=" UPDATE pets SET p_name='$p_name',photo='$photo',gender='$gender',age='$age'
    ,size='$size',variety='$v',p_description='$desc',microchip='$m',ligation='$l',type='$type'    
    WHERE p_id = '$p_id';";
    $result =  database::$conn->query($sql);// or die("select error");
    if( $result ) $response["status"] = "success";

}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


