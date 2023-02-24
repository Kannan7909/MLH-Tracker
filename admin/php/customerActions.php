<?php
require "../../config/databaseConnection.php";
include('admin.php');

$admin = new admin();

$action = $_GET['action'];
$userId = $_GET['userId'];

//Activate User
if($action=='activate'){
    $activate = $admin->activateCustomer($userId);
    echo "<script>
        window.location.href='../home.php';
        </script>";
}
elseif($action=='deactivate'){
    $activate = $admin->deactivateCustomer($userId);
    echo "<script>
        window.location.href='../home.php';
        </script>";
}
elseif($action=='delete'){
    $activate = $admin->deleteCustomer($userId);
    echo "<script>
        window.location.href='../home.php';
        </script>";
}
//Deactivate User
//Delete User


?>