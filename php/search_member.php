<?php
    require("show.php");
    $response = [
        "status" => "fail",
    ];
    $array=[];

    $content = $_REQUEST["content"];
    $sql = " select c_name,c_phone, c_mail, c_points from customer WHERE u_id = '$content'; ";
    $result =  database::$conn->query($sql);
    if( $row =  $result->fetch_array(MYSQLI_ASSOC) ){
        $temp=[
            "c_name" => $row["c_name"],
            "c_phone" => $row["c_phone"],
            "c_mail" => $row["c_mail"],
            "c_points" => $row["c_points"],
        ];
        array_push($array,$temp); 

        $response["status"] = "success";
        $response["data"] = $array ;
    }
    
    $sql_1 = " SELECT c_name,c_phone, c_mail, c_points from customer WHERE c_name='$content'; ";
    $result_1 =  database::$conn->query($sql_1);
    
    if( $row_1 =  $result_1->fetch_array(MYSQLI_ASSOC) ){
        $temp=[
            "c_name" => $row_1["c_name"],
            "c_phone" => $row_1["c_phone"],
            "c_mail" => $row_1["c_mail"],
            "c_points" => $row_1["c_points"],
        ];
        array_push($array,$temp); 
        
        $response["status"] = "success";
        $response["data"] = $array ;
    }
        


    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>

    