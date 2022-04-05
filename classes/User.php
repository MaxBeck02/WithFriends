<?php
require_once 'DbConfig.php';

class User extends DbConfig
{
    public function create($username, $email, $password, $confPassword, $birthDate, $captchaResponse)
    {
        try {
            $responseData = $this->checkReCaptcha($captchaResponse);
            $users = $this->getUsers();

            foreach ($users as $user) {
                if ($user->name === $username || $user->email === $email) {
                    throw new Exception("<p class='errorMessage'>Username or Email already taken. </p>");
                }
            }
            if ($password != $confPassword) {
                throw new Exception("<p class='errorMessage'>Passwords do not match. </p>");
            }
            if (!isset($responseData->success) || !$responseData->success) {
                throw new Exception("<p class='errorMessage'>Failed to complete reCaptcha. </p>");
            }

            $friendCode = $this->generateFriendCode();
            $sql = "INSERT INTO users (name, email, password, dateOfBirth, friendCode) VALUES (:username, :email, :password, :dateOfBirth, :friendcode)";
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $encryptedPassword);
            $stmt->bindParam(':dateOfBirth', $birthDate);
            $stmt->bindParam(':friendcode', $friendCode);
            if (!$stmt->execute()) {
                throw new Exception("<p class='errorMessage'>Account could not be created. </p>");
            }
            header("location: login.php");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($username) {
        $sql = "DELETE FROM users WHERE name = :username;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        header('Location: login.php');
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

    public function setUsername($username, $newUsername) {
        $sql = "UPDATE users SET name = :newUsername WHERE name = :username;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":newUsername", $newUsername);
        $stmt->execute();
    }

    public function setEmail($username, $newEmail) {
        $sql = "UPDATE users SET email = :newEmail WHERE name = :username;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":newEmail", $newEmail);
        $stmt->execute();
    }

    public function changePassword($username, $password, $confPassword) {
        try {
            if ($password != $confPassword) {
                throw new Exception("<p class='errorMessage'>Passwords do not match. </p>");
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $sql = "UPDATE users SET password = :newPassword WHERE name = :username;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":newPassword", $encryptedPassword);
        $stmt->execute();
    }

    public function login($username, $password, $captchaResponse)
    {
        try {
            $user = $this->getUser($username);
            $responseData = $this->checkReCaptcha($captchaResponse);

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
            $_SESSION['username'] = $username;
            header("Location: Setting-page.php");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function generateFriendCode() {
        $users = $this->getUsers();
        $randNum = rand(100000,999999);

        foreach($users as $user) {
            if($randNum === $user->friendCode) {
                $this->generateFriendCode();
            }
            return $randNum;
        }
    }

    public function checkReCaptcha($captchaResponse) {
        $siteKey = '6LfBmkMfAAAAAIgZ_NfOh0H5wyhCQX8sHfVPFq_8';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $siteKey . '&response=' . $captchaResponse);
        return json_decode($verifyResponse);
    }
}

?>