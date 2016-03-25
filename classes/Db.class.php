<?php
class Db {
    private static $conn;
    public static function getInstance(){
        if (is_null(self::$conn)){
            self::$conn = new PDO("mysql:host=localhost; dbname=instagram", "root", "root");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}