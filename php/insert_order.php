<?php 

require("database.php");
require("openSession.php");
$response = [
    "status" => "fail"
];
if(
    !empty($_REQUEST["time"]) && !empty($_REQUEST["people"])&& 
    !empty($_REQUEST["seat"])&&!empty($_REQUEST["adopt"])
) {
    $u_id = $_SESSION["id"]; 
    $time = $_REQUEST["time"];
    $people = $_REQUEST["people"];
    $seat = $_REQUEST["seat"];
    $adopt = $_REQUEST["adopt"];
    $note = $_REQUEST["note"];
  
    $sql = "INSERT INTO orders
        (u_id, meal_time, num_of_people, seat, adoption, note) 
        VALUES
        ('$u_id', '$time', '$people', '$seat', '$adopt', '$note')";
    $result = database::$conn->query($sql);
    $sql = "UPDATE customer SET c_points=c_points+50 WHERE u_id=$u_id";
    $result = database::$conn->query($sql);
    
    if ($result) {
        $response["status"] = "success";
    }
    else{
        $response["error"] = mysqli_error(database::$conn);
    }
}
else {
    $response["error"] = "有資料為空";
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);

