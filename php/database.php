<?php
class database {
    public static $conn;
    static function conn() {
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'woochi';
        self::$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');
        mysqli_set_charset(self::$conn, 'utf8');
        // self::$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        self::$conn->query("SET NAMES 'utf8'");
    }
}
database::conn();
?>