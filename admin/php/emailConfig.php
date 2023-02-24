<?php
require "../../config/databaseConnection.php";
require "admin.php";

$admin = new admin();

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $hostName = $_POST['hostName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $fromAddress = $_POST['fromAddress'];
    
    if($id==""){
        $result = $admin->addEmailConfig($hostName, $userName, $password, $fromAddress);
        echo "<script>
                alert('Added Succesfully');
                window.location.href='../settings.php';
            </script>";
    }
    else{
        $result = $admin->updateEmailConfig($id,$hostName, $userName, $password, $fromAddress);
        echo "<script>
                alert('Updated Succesfully');
                window.location.href='../settings.php';
            </script>";
    }
}

?>
