<?php
require_once 'DbConfig.php';
class DbConfig{
    public function connect(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=withfriends", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>