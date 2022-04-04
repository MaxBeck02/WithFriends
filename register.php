<?php
$error = '';
require_once 'partials/autoLoader.php';

if (isset($_POST['register'])) {
    $error = $user->create($_POST['username'], $_POST['email'], $_POST['password'], $_POST['conf-password'], $_POST['dateOfBirth']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>W/Friends | Register</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="icon" type="image/x-icon" href="image/wfriendslogo.png">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>

<main>
    <section class="form">
        <form class="box" method="post">
            <img class="logo" src="images/With_friends_logo.png" alt="Logo">
            <h1>Register</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="conf-password" placeholder="Confirm password" required>
            <input type="date" name="dateOfBirth" placeholder="Date of birth" required>
            <?php echo $error ?>
            <input type="submit" name="register" value="Register">
            Sign up for account? <a href="login.php">Login here</a>
            <div class="g-recaptcha" data-sitekey="6LfBmkMfAAAAAJBOY5QZx-oNIzz6hQ6PEQ_ttnM0"></div>
        </form>
    </section>
</main>


</body>
</html>
