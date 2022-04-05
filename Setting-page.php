<?php
    $error = '';
    require_once 'partials/autoLoader.php';
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        header('Location: login.php');
    }

    $curUser = $user->getUserById($_SESSION['userID']);

    if (isset($_POST['CN'])) {
        $user->setUsername($_SESSION['userID'], $_POST['name']);
    }

    if (isset($_POST['CEM'])) {
        $user->setEmail($_SESSION['userID'], $_POST['email']);
    }

    if (isset($_POST['CP'])) {
        $error = $user->ChangePassword($_SESSION['userID'], $_POST['password'], $_POST['passwordConf']);
    }
    
    if (isset($_POST['delete'])) {
        $user->delete($_SESSION['userID']);
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

<main>
    <div id="box1">
        <div id="dubb">
        <break>

        <form method="POST">
            <h3>Change Name</h3>
                <input type="text" name="name" placeholder="Change name" maxlength="100" size="30" value="<?= $curUser->name ?>">
                <input type="submit" name="CN" value="Submit">
        <form>

        <br></br>

        <form method="POST">
            <h3>Email adress</h3>
                <input type="email" name="email" placeholder="Change email address" maxlength="100" size="30" value="<?= $curUser->email ?>">
                <input type="submit" name="CEM" value="Submit">
        <form>
            
        <br></br>

        <form method="POST">   
            <h3>Password</h3>
                <div id="passrow" style="margin-bottom: 10px">
                    <div id="passcoll">
                        <input type="password" name="password" placeholder="Change password" maxlength="100" size="30">
                        <input type="password" name="passwordConf" placeholder="Confirm password" maxlength="100" size="30">
                        <input type="submit" name="CP" value="Submit">
                    </div>
                </div>
            <?= $error ?>
        </form>
        
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
            </div>
    </div>
</main>

<?php require_once 'partials/footer.html'?>

</body>
</html>