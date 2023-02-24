<?php
require "../config/databaseConnection.php";
require "php/admin.php";

$userObj = new admin();
$users = $userObj->getUsers();

?>