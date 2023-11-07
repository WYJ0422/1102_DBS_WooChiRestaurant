<?php
//店家回覆評論
require("database.php");
require("openSession.php");
$response = [
    "status" => "fail",
];

$r_id = $_REQUEST["r_id"];
$content = $_REQUEST["content"];

$sql=" UPDATE rate SET r_reply='$content' WHERE r_id='$r_id';";
$result = database::$conn->query($sql) or die('error with update');

if(!empty($result)){
    $response["status"] = "success";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>