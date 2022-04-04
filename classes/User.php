<?php
require_once 'DbConfig.php';

class User extends DbConfig
{

    public function create($username, $email, $password, $confPassword, $birthDate)
    {
        try {
            if ($password != $confPassword) {
                throw new Exception("<p class='errorMessage'>Passwords do not match. </p>");
            }
            $sql = "INSERT INTO users (name, email, password, dateOfBirth) VALUES (:username, :email, :password, :dateOfBirth)";
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $encryptedPassword);
            $stmt->bindParam(':dateOfBirth', $birthDate);
            if (!$stmt->execute()) {
                throw new Exception("<p class='errorMessage'>Account could not be created. </p>");
            }
            header("location: login.php");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUser($username)
    {
        $sql = "SELECT * FROM users WHERE name = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function login($username, $password, $captchaResponse)
    {
        try {
            $siteKey = '6LfBmkMfAAAAAIgZ_NfOh0H5wyhCQX8sHfVPFq_8';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $siteKey . '&response=' . $captchaResponse);
            $responseData = json_decode($verifyResponse);
            $user = $this->getUser($username);

            if (!$user) {
                throw new Exception("<p class='errorMessage'>User does not exist. </p>");
            }
            if (!password_verify($password, $user->password)) {
                throw new Exception("<p class='errorMessage'>Passwords is not verified. </p>");
            }
            if (!isset($responseData->success) || !$responseData->success) {
                throw new Exception("<p class='errorMessage'>Failed to complete reCaptcha. </p>");
            }

            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user->username;
            header("Location: index.html");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>