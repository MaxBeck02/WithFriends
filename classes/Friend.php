<?php
    require_once 'DbConfig.php';

    class Friend extends DbConfig{
        //fetch(PDO::OBJ)
        //fetchAll(PDO::FETCH_OBJ)

        // public function getUser(){
        //     $sql = "SELECT friendCode, name, profilepic, friends FROM users";
        //     $stmt= $this->connect()->prepare($sql);
        //     $stmt->execute();
        //     return $stmt->fetchAll(PDO::FETCH_OBJ);
        // }
        public function getCode(){
            $sql = "SELECT friendCode FROM users WHERE name = 'Kenan'";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getFriend(){
            $i = 0;
            while($i <= 3){
                $i++;
            }
            $sql = "SELECT * FROM users LIMIT $i";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function getProfilePic(){
            $sql = "SELECT profilepic FROM `users` WHERE profilepic = 'pfp.png'";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function search(){
            $sql = "SELECT userID FROM users LIKE ?";  // ? placeholder in query
            $stmt = $this->connect()->prepare($sql);
            $stmt->bind_param("s", "%$term%");       // insert your variable into the placeholder (still need to add % wildcards)
            $stmt->execute();
        } 
        public function limit($i){
            $i = 1;
            if($i <= 4){
                $i++;
            }
        }
}
?>