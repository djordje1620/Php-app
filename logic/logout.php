<?php
include_once('session.php');

if(isset($_SESSION["user"])){
    unset($_SESSION["user"]);
    $userObj = false;
    header('Location: ../view/pages/login.php');
    }
    if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
    $adminObj = false;
    header('Location: ../view/pages/login.php');
}
?>
    