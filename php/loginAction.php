<?php
require "../config/databaseConnection.php";
include('user.php');

session_start();

$userObj = new user();

if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $password = md5($password);
    $login = $userObj->login($userName, $password);
    $rowCount = mysqli_num_rows($login);
    
    
    if($rowCount>=1){
        $row = mysqli_fetch_assoc($login);  
        
        $_SESSION['customer_loggedIn'] = true;
        $_SESSION['userId'] = $row['customerId'];
        $_SESSION['userName'] = $row['firstName'];
        echo 1;
    }
    else{
        echo 0;
    }
}

?>