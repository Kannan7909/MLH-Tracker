<?php

require("../config/databaseConnection.php");
require("user.php");

$userObj = new user();

$userId = $_GET['id'];
$userDetail = $userObj->getUser($userId);

$otp = $userDetail['otp'];
$email = $userDetail['email'];

if($email!=""){
    $sendMail = $userObj->sendMail("Registration Success", $email, "Thank you for subscribing to MLH Tracker. Please validate your email-id with the below OTP <br> OTP: $otp");          

    echo "<script> window.location.href = 'mailVerification.php?id=" . $userId . "'; </script>";
}
else{
    echo "<script> window.location.href = '../index.php'</script>";
}


?>