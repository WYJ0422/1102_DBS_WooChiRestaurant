<?php

require("database.php");
require("openSession.php");
$response = [
    "status" => "success"
];

$u_id = $_SESSION["u_id"];
$o_id=1;

$time = $_REQUEST["time"];
$num = $_REQUEST["num"];
$seat = $_REQUEST["seat"];
$adopt = $_REQUEST["adopt"];
$note = $_REQUEST["note"];


// echo $name."<br>".$phone."<br>".$mail ;

if($u_id!=1){
    $sql=" UPDATE orders SET meal_time='$time',num_of_people='$num',
    seat='$seat',adoption='$adopt',
    note='$note' WHERE o_id = '$o_id'; " ;
    $result =  database::$conn->query($sql);//or die("select error");
    //if( $result ) $response["status"] = "success";

}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
