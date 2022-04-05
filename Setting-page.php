<?php
    require_once 'partials/autoLoader.php';
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        header('Location: login.php');
    }

    if (isset($_POST['delete'])) {
        $user->delete($_SESSION['username']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Stylesheet.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Setting page</title>
</head>
<body>
<?php require_once 'partials/header.html'?>

    <div id="box1">
        <div id="dubb">
        <break>

        <h3>Email adress</h3>
            <input name="Change email address" placeholder="Change email address" maxlength="100" size="30">
            <input type="submit" value="Submit">
            <br></br>

        <h3>Phone number</h3>
            <input name="Change phone number" placeholder="Change phone number" maxlength="100" size="30">
            <input type="submit" value="Submit"> <!--No submit location and no connection-->
            <br></br>
            
        <h3>Password</h3>
            <input name="Change password" placeholder="Change password" maxlength="100" size="30">
            <input type="submit" value="Submit"> <!--No submit location and no connection-->
            <br></br>

        <h5>Change user profile picture</h5>
        <br></br>

        <form method="POST" id="buttons">
            <button>Disable account</button>
            <!-- code for acc disable-->
            <input type="submit" name="delete" value="Delete account">
            <!--code for acc delete -->
        </form>
        </div>
            <div id="dubb">
                <a href="#"> <!--add href to file exploder-->
                    <img src='./images/default-avatar.png' id="pfp" onmouseover="this.src='./images/ChangePFP.png';" onmouseout="this.src='./images/default-avatar.png';" />
                </a>
                <button>Change name</button> <!--No submit location and no connection-->
            </div>
    </div>


<?php require_once 'partials/footer.html'?>

</body>
</html>