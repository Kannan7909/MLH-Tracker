<?php
require "../config/databaseConnection.php";
require "user.php";

$user = new user();

$email = $_POST['email'];
$checkUser = $user->checkUserExist($email);

if($checkUser){
    echo 1;
}
else{
    echo 0;
}

?>
