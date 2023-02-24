<?php

require("../config/databaseConnection.php");
require("user.php");

$userObj = new user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $custoemrId = $_POST['customerId'];
    $email = $_POST['emailId'];
    $otp = $_POST['otp'];

    $validateEmail = $userObj->validateEmailId($email, $otp);
    
    if($validateEmail){
        $updateStatus = $userObj->updateStatus($email);
        echo 1;
    }
    else{
        echo 0;
    }
    

}

?>