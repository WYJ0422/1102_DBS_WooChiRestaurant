<?php
//會員新增評論
require("database.php");
require("openSession.php");
$response = [
    "status" => "fail",
];

$star = $_REQUEST["star"];
$content = $_REQUEST["content"];
$date = date('Y-m-d');
$u_id=$_SESSION["id"];


$sql=" insert into rate(u_id,score,r_date,r_content)values('$u_id','$star','$date','$content');";
$result = database::$conn->query($sql) or die('error with insert');

if(!empty($result)){
    $response["status"] = "success";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>