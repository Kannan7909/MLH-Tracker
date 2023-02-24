<?php

require("../config/databaseConnection.php");
require("user.php");

$userObj = new user();

$otp = $_POST['otp'];
$email = $_POST['email'];
$sendMail = $userObj->sendMail("Registration Success", $email, "Thank you for subscribe, Please validate your email id OTP :- $otp");          

?>