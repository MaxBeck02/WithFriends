<?php

class DbConfig {

    public function connect(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=withfriends", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
     }
    // public function insertLocation(lat, long){
    //     //db connecten 
    //     $sql = "INSERT INTO users (latitude) VALUES ('$lat')";

    //     $sql = "INSERT INTO users (Longitude) VALUES ('$long')";
    // }
}
// $db = new DbConfig();
// $db->insertLocation($_POST['lat'], ['long']);

?>