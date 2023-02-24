<?php
require "../../config/databaseConnection.php";
include('admin.php');

session_start();

$userObj = new admin();

if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $password = md5($password);
    $login = $userObj->login($userName, $password);
    $rowCount = mysqli_num_rows($login);
    
    if($rowCount>=1){
        $row = mysqli_fetch_assoc($login);  
        $_SESSION['admin_loggedIn'] = true;
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['userName'] = $row['userName'];
        $_SESSION['role'] = $row['role'];
        echo 1;
    }
    else{
        echo 0;
    }
}

?>