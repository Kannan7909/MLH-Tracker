<?php

require("../config/databaseConnection.php");
require("user.php");

$userObj = new user();

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $register = $userObj->contact($firstName,$lastName,$email,$phone,$message);
    echo 1;

}

?>