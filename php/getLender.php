<?php
require "../config/databaseConnection.php";
require "user.php";

$user = new user();
$regionId = $_POST['data'];
$regionId = json_decode($regionId);

if(is_array($regionId)){
    $regionIds = implode(',',$regionId);
}
else{
    $regionIds = $regionId;
}   

$lenders = $user->getLender($regionIds);
//print_r($lenders);
echo json_encode($lenders);
?>
