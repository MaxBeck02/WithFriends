<?php
    require_once './partials/footer.html';
    require_once './partials/header.html';
    require_once './classes/DbConfig.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Stylesheet.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <title>Setting page</title>
</head>
<body>
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

        <div id="buttons">
            <button>Disable account</button>
            <!-- code for acc disable-->
            <button>Delete Account</button>
            <!--code for acc delete -->
        </div>
        </div>
            <div id="dubb">
                <a href="#"> <!--add href to file exploder-->
                    <img src='./images/default-avatar.png' id="pfp" onmouseover="this.src='./images/ChangePFP.png';" onmouseout="this.src='./images/default-avatar.png';" />
                </a>
                <button>Change name</button> <!--No submit location and no connection-->
            </div>  
    </div> 

</body>
</html>