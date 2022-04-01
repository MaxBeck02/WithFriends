<?php
require_once '../backend/User.php';

$user = new User();

if (isset($_POST['login'])) {

    echo $user->login($_POST);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>W/Friends | Login</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="icon" type="image/x-icon" href="image/wfriendslogo.png">
    <script src="https://www.google.com/recaptcha/api.js"></script>


  </head>

  <body>
            <form class="box" method="post">
                <img class="logo" src="image/wfriendslogo.png" alt="Logo">
                <h1>Login</h1>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="login" value="Login">
                <input type= hidden" name="token_generate" id="token_generate">
                <p class="login">
                  New? <a href="register.php">Click here to register.</a>
                </p>
 <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6Le1HzYfAAAAAP9SdeuzJ7GDta-hWegd8lpABac1"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>

            </form>
  </body>
</html>
