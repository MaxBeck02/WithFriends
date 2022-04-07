<?php
var_dump($_POST);

include 'partials/autoloader.php';
session_start();
if(isset($_GET['lat'])) {
    $user->setLocation($_SESSION['userID'], $_GET['long'], $_GET['lat']);
}

var_dump($_POST);

?>
