<?php
require "../config/databaseConnection.php";
require "php/admin.php";

$admin = new admin();

$regions = $admin->getRegion();

?>
