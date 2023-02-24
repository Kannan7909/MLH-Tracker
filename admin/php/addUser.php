<?php
require "../../config/databaseConnection.php";
require "admin.php";

$admin = new admin();

if(isset($_POST['submit'])){
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $password = md5($password);
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $result = $admin->addUser($fName, $lName, $userName, $password, $phone, $email);
    
    if($result){
        echo "<script>
        alert('Added Succesfully');
        window.location.href='../users.php';
        </script>";
    }
    header("Location: ../users.php");
}

?>
