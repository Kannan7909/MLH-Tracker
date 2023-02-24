<?php
require "../../config/databaseConnection.php";
require "admin.php";
session_start();
$userId = $_SESSION['userId'];

$admin = new admin();

if(isset($_POST['submit'])){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $oldPassword = md5($oldPassword);
    $newPassword = md5($newPassword);

    $checkUser = $admin->checkPassword($userId,$oldPassword);
    
    if($checkUser){
        $changePassword = $admin->changePassword($newPassword,$userId);
        echo 1;
    }
    else{
        echo 0;
    }
}

?>
