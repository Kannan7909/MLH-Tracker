<?php

require("../config/databaseConnection.php");
require("user.php");
session_start();

$userObj = new user();

$email = $_POST['email'];
$otp = $_POST['OTP'];
$otpVerification = $userObj->otpVerification($email, $otp);

if($otpVerification){
    echo 1;
}
else{
    echo 0;
}

?>