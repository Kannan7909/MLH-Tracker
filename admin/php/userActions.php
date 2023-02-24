<?php
require "../../config/databaseConnection.php";
include('admin.php');

$admin = new admin();

$action = $_GET['action'];
$userId = $_GET['userId'];

//Activate User
if($action=='activate'){
    $activate = $admin->activateUser($userId);
    echo "<script>
        window.location.href='../users.php';
        </script>";
}
elseif($action=='deactivate'){
    $activate = $admin->deactivateUser($userId);
    echo "<script>
        window.location.href='../users.php';
        </script>";
}
elseif($action=='delete'){
    $activate = $admin->deleteUser($userId);
    echo "<script>
        window.location.href='../users.php';
        </script>";
}
//Deactivate User
//Delete User


?>