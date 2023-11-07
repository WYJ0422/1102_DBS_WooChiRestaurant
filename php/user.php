<?php

require("database.php");
class user {
    static function isValid($account, $password) {
        $hashPassword = hash("sha256", $password);
        $select = "SELECT password FROM users WHERE account = '$account' ; ";
        $result = database::$conn->query($select);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            if ($row["password"] === $hashPassword) {
                return true;
            }
            break;
        }
        return false;
    }
    static function createsession($data) {
        session_start();
        foreach ($data as $key => $val) {
            $_SESSION[$key] = $val;
        }
    }
    static function createcookie($data) {
        foreach ($data as $key => $val) {
            setcookie($key, $val, time()+60*60, "/", "", 0);
        }
    }
    static function login($account, $password) {
        if (self::isValid($account, $password)) {
            $select = "SELECT u_id FROM users WHERE account='$account'; ";
            $result =  database::$conn->query($select)   ;
            $data = [];
            $token = bin2hex(random_bytes(16));
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $data["id"] = $row["u_id"];
                $data["token"] = $token;
                self::createsession($data);
                self::createcookie($data);
                return true;
            }
        }
        return false;
    }
    static function logout() {
        if (isset($_SERVER['HTTP_REFERER'])) {
            foreach ($_COOKIE as $key=>$value) {
                setcookie($key, "", time()-3600, "/", "", 0);
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);//可以获取当前链接的上一个连接的来源地址
            exit();
        }
        else {
            header("Location: ./");
        }
    }
    static function check() {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        if (!empty($_COOKIE["token"])) {
            if (!empty($_SESSION["token"]) && $_SESSION["token"]===$_COOKIE["token"]) {
                return true;
            }
        }
        return false;
    }
    static function register($account, $password, $name,$phone,$mail) {
        $hashPassword = hash("sha256", $password);
        $insert = "INSERT INTO users( account, password) VALUES('$account', '$hashPassword')";
        database::$conn->query($insert) or die(" insert users error");


        $select = "select u_id from users where account = '$account';";//參考users的u_id
        $result = database::$conn->query($select);
        $r = $result->fetch_array(MYSQLI_ASSOC) or die ("select u_id error");
        $d = $r["u_id"];
        $sql = "INSERT INTO customer(u_id,c_name, c_phone, c_mail) 
        VALUES ('$d','$name','$phone','$mail')";
        database::$conn->query($sql) or die (" insert error ");
      
      
        /*$getId = "SELECT U_Id FROM USERS WHERE Email='$email'";
        $result = Database::$connect->query($getId);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $uid = $row["U_Id"];
        }
        if ($type === "customer") {
            $insert = "INSERT INTO CUSTOMER(U_Id) VALUES($uid)";
            Database::$connect->query($insert);
            return;
        }
        if ($type === "merchant") {
            $insert = "INSERT INTO MERCHANT(U_Id) VALUES($uid)";
            Database::$connect->query($insert);
            return;
        }*/
    }
}

?>