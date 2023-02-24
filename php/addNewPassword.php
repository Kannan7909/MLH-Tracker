<?php

require("../config/databaseConnection.php");
require("user.php");
session_start();

$userObj = new user();

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$passwordChange = $userObj->addNewPassword($email, $password);

?>