<?php

require("../config/databaseConnection.php");
require("user.php");
session_start();

$userObj = new user();

$email = $_POST['email'];

$otp = random_int(100000, 999999);
$subject = "MLH Tracker password assistance";
$message = "<p>To authenticate, please use the following One Time Password(OTP):</p>
            <h4>$otp</h4>
            <p>Don't share this OTP with anyone.</p>";
$sendMail = $userObj->sendMail($subject, $email, $message);   
$updateOtp = $userObj->updateOtp($email, $otp);


?>