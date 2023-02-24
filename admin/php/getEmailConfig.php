<?php
require "../config/databaseConnection.php";
require "php/admin.php";

$userObj = new admin();
$emailConfig = $userObj->getEmailConfig();

?>