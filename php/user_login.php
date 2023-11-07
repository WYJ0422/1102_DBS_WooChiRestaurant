<?php
require("user.php");
$response = [
    "status" => "fail",
];

if (user::login($_REQUEST["account"], $_REQUEST["password"])) {
    $response["status"] = "success";
}
else {
    $response["error"] = "帳號或密碼錯誤";
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response,JSON_UNESCAPED_UNICODE);
    	
?>

    