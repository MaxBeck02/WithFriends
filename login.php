<?php
$error = '';

require_once 'classes/User.php';

$user = new User();

if (isset($_POST['login'])) {
    $error = $user->login($_POST['username'], $_POST['password'], $_POST['g-recaptcha-response']);
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
    <img class="logo" src="images/With_friends_logo.png" alt="Logo">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="login" value="Login">
    <input type="hidden" name="token_generate" id="token_generate">

    <?php echo $error ?>
    <p class="login">
        New? <a href="register.php">Click here to register.</a>
    </p>

    <div class="g-recaptcha" data-sitekey="6LfBmkMfAAAAAJBOY5QZx-oNIzz6hQ6PEQ_ttnM0"></div>
</form>

</body>
</html>
