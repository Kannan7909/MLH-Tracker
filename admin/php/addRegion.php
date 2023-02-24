<?php
require "../../config/databaseConnection.php";
require "admin.php";

$admin = new admin();

if(isset($_POST['submit'])){
    $region = $_POST['region'];
    $regions = explode(',',$region);
    $result = $admin->addRegion($regions);
    echo 1;
}

?>
