<?php
    require("show.php");
    $response = [
        "status" => "fail",
    ];
    $array=[];
    $content = $_POST["content"];
    $sql = " SELECT * FROM orders WHERE o_id='$content'; ";
    $result =  database::$conn->query($sql);

    if( $row=$result->fetch_array(MYSQLI_ASSOC) )	{
        $time = $row["meal_time"];
        $num = $row["num_of_people"];
        $seat = $row["seat"];
        $a = $row["adoption"];
        $n = $row["note"];

        $sql_5 = " SELECT u_id from orders where o_id = '$content' ";
        $result_5 =  database::$conn->query($sql_5);
        $row_5 =  $result_5->fetch_array(MYSQLI_ASSOC);
        $u_id = $row_5["u_id"];

        $sql_6 = " SELECT c_name,c_phone,c_mail from customer where u_id = '$u_id' ";
        $result_6 =  database::$conn->query($sql_6);
        $row_6 =  $result_6->fetch_array(MYSQLI_ASSOC);
        
        $temp=[
            "meal_time" => $time,
            "num_of_people" => $num,
            "seat" => $seat,
            "adoption" => $a,
            "note" => $n,
            "c_name" => $row_6["c_name"],
            "c_phone" => $row_6["c_phone"], 
            "c_mail" => $row_6["c_mail"]
        ];

        array_push($array,$temp);
        $response["status"] = "success";
        $response["data_order"] = $array ;
        $response["type"] = "ID";
    }

    $sql_1 = " SELECT u_id,c_name FROM customer WHERE c_name='$content'; ";
    $result_1 =  database::$conn->query($sql_1);
    
    if( $row_1 =  $result_1->fetch_array(MYSQLI_ASSOC) ){
        $u_id = $row_1["u_id"];
        $c_name = $row_1["c_name"];

        $sql_2 = " SELECT o_id,meal_time FROM  orders WHERE u_id = '$u_id'order by meal_time DESC; ";
        $result_2 =  database::$conn->query($sql_2);
        

        while( $row_2 =  $result_2->fetch_array(MYSQLI_ASSOC) ){

            $temp=[
                "o_id" => $row_2["o_id"],
                "meal_time" => $row_2["meal_time"],
                "name" => $c_name,
            ];

            array_push($array,$temp); 
            
            $response["status"] = "success";
            $response["data_order"] = $array ;
            $response["type"] = "name";
        }
        
    }

    $sql_3 = " SELECT o_id,meal_time,u_id from orders  Where date_format(meal_time,'%Y-%m-%d')='$content' ; ";
    $result_3 =  database::$conn->query($sql_3) or die("error");
    
    while( $row_3 = $result_3->fetch_array(MYSQLI_ASSOC) ){
        $u_id = $row_3["u_id"];
        
        $sql_4 = " SELECT c_name FROM customer WHERE u_id='$u_id'; ";
        $result_4 = database::$conn->query($sql_4) or die("error4");
        $row_4 =  $result_4->fetch_array(MYSQLI_ASSOC);
        $c_name = $row_4["c_name"];
        
        
        $temp=[
            "o_id" => $row_3["o_id"],
            "meal_time" => $row_3["meal_time"],
            "name" => $c_name,
        ];
        array_push($array,$temp);

        $response["status"] = "success";
        $response["data_order"] = $array ;
        $response["type"] = "date";
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>

    