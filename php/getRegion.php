<?php
require "config/databaseConnection.php";
require "php/user.php";

$user = new user();

$regions = $user->getRegion();

?>
