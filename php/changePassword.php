<?php
require "../config/databaseConnection.php";
require "user.php";
session_start();
$userId = $_SESSION['userId'];

$user = new user();

if(isset($_POST['submit'])){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $oldPassword = md5($oldPassword);
    $newPassword = md5($newPassword);

    $checkUser = $user->checkPassword($userId,$oldPassword);
    
    if($checkUser){
        $changePassword = $user->changePassword($newPassword,$userId);
        echo 1;
    }
    else{
        echo 0;
    }
}

?>
