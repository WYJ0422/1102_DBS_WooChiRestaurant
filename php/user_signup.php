<?php
    require("user.php");
    $response = [
        "status" => "fail",
    ];
    
    $account = $_REQUEST["account"];
    $password = $_REQUEST["password"];
    $name = $_REQUEST["name"]; 
    $phone = $_REQUEST["tel"];
    $mail = $_REQUEST["mail"];

    
    //判斷
    $sql = " select  account from users where account = '$account' ; ";
    $result = database::$conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if( empty($account) ||  empty($password)){
        $response["status"] = "fail";
        $response["error"] = "未填寫帳號密碼";  
    }else if( !empty($row['account']) ){
        $response["error"] = "帳號已建立";  
    }else{
       $r = user::register($account, $password, $name,$phone,$mail) ;
       $response["status"] = "success";
    }
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>