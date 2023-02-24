<?php
require "../../config/databaseConnection.php";
require "admin.php";

$admin = new admin();

if(isset($_POST['submit'])){
    $regionId = $_POST['region'];
    $lender = $_POST['lender'];
    $lenders = explode(',',$lender);
    $result = $admin->addLender($regionId, $lenders);
    
    echo "<script>
        alert('Added Succesfully');
        window.location.href='../addData.php';
        </script>";
}

?>
