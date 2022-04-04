
<?php
require_once 'DbConfig.php'; 

class User extends DbConfig {

    public function create($data){
        try{
            if($data['password'] != $data['conf-password']){
                throw new Exception("<p class='errorMessage'>Passwords do not match. </p>");
            }
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':password', $encryptedPassword);
            if(!$stmt->execute()){
                throw new Exception("<p class='errorMessage'>Account could not be created. </p>");
            }
            header("location: login.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getUsers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function login($data){
        try{
            $user = $this->getUser($data['username']);
            if(!$user){
                throw new Exception("<p class='errorMessage'>User does not exist. </p>");
            }
            if(!password_verify($data['password'], $user->password)){
                throw new Exception("<p class='errorMessage'>Passwords is not verified. </p>");
            }
            session_start();
            $_SESSION['ingelogd'] = true;
            $_SESSION['username'] = $user->username;
            header("Location: backend/admin.php");
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }
}

?>