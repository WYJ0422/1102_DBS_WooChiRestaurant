<?php

require("database.php");
require("openSession.php");
class show {
    static function customer($u_id) {
        $array = [];
        $sql = " select c_name,c_phone, c_mail, c_points from customer WHERE u_id = '$u_id'; ";
        $result =  database::$conn->query($sql);
        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $temp=[
                "c_name" => $row["c_name"],
                "c_phone" => $row["c_phone"],
                "c_mail" => $row["c_mail"],
                "c_points" => $row["c_points"],
            ];
            array_push($array,$temp); 
        }
        $sql = " select account from users WHERE u_id = '$u_id'; ";
        $result =  database::$conn->query($sql);
        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $temp=[
                "account" => $row["account"],
            ];
            array_push($array,$temp); 
        }
        return $array ;
    }
    static function restaurant($u_id) {
        $sql = " SELECT name,mail, phone,location,opening_hour,description FROM restaurant WHERE u_id= '$u_id'; "; 
        $result =  database::$conn->query($sql);
        $row =  $result->fetch_array(MYSQLI_ASSOC);
        
        return $row ;
    }
    static function news($u_id,$array) {
        
        $sql = " SELECT n_information, release_date FROM news WHERE  u_id= '$u_id' order by release_date DESC; ";
        $result =  database::$conn->query($sql);
       
        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $temp=[
                "content" => $row["n_information"],
                "date" => $row["release_date"]
            ];
            array_push($array,$temp); 
        }
       return $array ;
    }
    static function pets($u_id, $array) {
        $array = ["cats"=>[], "dogs"=>[]];
        $sql = "  SELECT * FROM pets WHERE  u_id= '$u_id'; "; 
        $result =  database::$conn->query($sql);

        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $type = $row["type"]=="狗" ? "dogs" : "cats";
            $temp=[
                "name" => $row["p_name"],
                "photo" => $row["photo"],
                "gender" => $row["gender"],
                "age" => $row["age"],
                "size" => $row["size"],
                "variety" => $row["variety"],
                "p_description" => $row["p_description"],
                "microchip" => $row["microchip"],
                "ligation" => $row["ligation"]
            ];
            array_push($array[$type], $temp); 
        }
       return $array ;
    }
    static function menu($array) {
        $sql = " SELECT image FROM images ORDER BY i_id"; 
        $result =  database::$conn->query($sql);
        while($row =  $result->fetch_array(MYSQLI_ASSOC)) {
            $temp=[
                "image" => $row["image"]
            ];
            array_push($array,$temp); 
        }
        return $array ;
    }
    static function rate($array) {
        $sql = " SELECT u_id FROM rate; ";
        $result =  database::$conn->query($sql);

        while( $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $u_id = $row["u_id"];
            $sql = "SELECT * FROM customer, rate WHERE customer.u_id=rate.u_id ORDER BY r_date DESC";
            $result =  database::$conn->query($sql);
            
            while($row =  $result->fetch_array(MYSQLI_ASSOC)){
                $temp=[
                    "name" => $row["c_name"],
                    "r_id" => $row["r_id"],
                    "score" => $row["score"],
                    "date" => $row["r_date"],
                    "content" => $row["r_content"],
                    "r_reply" => $row["r_reply"]
                ];
                array_push($array,$temp); 
            }  
            return $array ;
        }  
    }
    static function order($u_id,$array) {
        $sql = " SELECT o_id,meal_time FROM orders WHERE u_id='$u_id' order by meal_time DESC;";
        $result =  database::$conn->query($sql);
       
        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $temp=[
                "o_id" => $row["o_id"],
                "meal_time" => $row["meal_time"]
            ];
            array_push($array,$temp); 
        }
       return $array ;
    }
    static function order_detail($o_id,$array) {
        $sql = " SELECT * FROM orders WHERE o_id='$o_id'; ";
        $result =  database::$conn->query($sql);
       
        while(  $row =  $result->fetch_array(MYSQLI_ASSOC) ){
            $temp=[
                "meal_time" => $row["meal_time"],
                "num_of_people" => $row["num_of_people"],
                "seat" => $row["seat"],
                "adoption" => $row["adoption"],
                "note" => $row["note"]
            ];
            array_push($array,$temp); 
        }
       return $array ;
    }
}

?>