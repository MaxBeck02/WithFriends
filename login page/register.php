<?php
require_once '../backend/User.php';


$user = new User();


if(isset($_POST['register'])){
	echo $user->create($_POST);
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
        <img class="logo" src="image/wfriendslogo.png" alt="Logo">
        <h1>Register</h1>
	    		<input type="text" name="username" placeholder="Username" required>
	    		<input type="password" name="password" placeholder="Password" required>
	    		<input type="password" name="conf-password" placeholder="Password" required>
	    		<input type="submit" name="register" value="Register">
            Sign up for account? <a href="login.php">Login here</a>
          </p>
 <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6Le1HzYfAAAAAP9SdeuzJ7GDta-hWegd8lpABac1"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
	    	</form>
    	</section>
    </main>



  </body>
</html>
