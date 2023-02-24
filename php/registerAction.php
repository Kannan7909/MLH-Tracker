<?php

require("../config/databaseConnection.php");
require("user.php");
session_start();

$userObj = new user();

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['line_1'];
    $addressLine2 = $_POST['line_2'];
    $addressLine3 = $_POST['line_3'];
    $addressPostTown = $_POST['post_town'];
    $addressPostCode = $_POST['postcode'];
    $address = "$addressLine1, $addressLine2, $addressLine3, $addressPostTown, $addressPostCode";
    $company = $_POST['company'];
    $regions = $_POST['region'];
    $region = implode(',', $regions);
    $lenders = $_POST['lender'];
    $lenderIds = array();

    foreach($lenders as $lender){
        $lenderParts = explode('-', $lender);
        $lenderId = $lenderParts[0];
        array_push($lenderIds, $lenderId);
    }
    
    $lender = implode(',', $lenderIds);
    
    $password = $_POST["password"];
    $password = md5($password);

    $checkUser = $userObj->checkUserExist($email);
    if($checkUser){
        echo 0;
    }
    else{
        $otp = random_int(100000, 999999);
        $registerId = $userObj->register($firstName, $lastName, $email, $phone, $address, $company, $region, $lender, $password, $otp);
        $addRegionLender = $userObj->customerLenderAdd($registerId,$lenders);
        
        $_SESSION['customer_loggedIn'] = true;
        $_SESSION['userId'] = $registerId;
        $_SESSION['userName'] = $firstName;

        $sendMail = $userObj->sendMail("Registration Success", $email, "Thank you for subscribing to MLH Tracker. Please validate your email-id with the below OTP <br> OTP: $otp");          

        echo $registerId;
    }
    

}

?>