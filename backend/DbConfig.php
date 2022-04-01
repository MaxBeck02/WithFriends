<?php

class DbConfig{

    public function connect(){
        try{
            $conn = new PDO("mysql:host=38.242.233.110;port=3306;dbname=wFriends", 'marly', 'LeidenPlymouth1');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>