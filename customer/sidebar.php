<?php
session_start();
if(!$_SESSION['customer_loggedIn']){
    echo "<script>
        window.location.href='../index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="asset/css/style.css"/>
    <link rel="stylesheet" href="asset/css/settings.css"/>
    <link rel="icon" href="../asset/images/mlh_logo.png"/>
    <link rel="stylesheet" href="asset/css/modal.css"/>
    <title>Customer || MLH Tracker</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <!--<div class="header_img"> <i class='bx bx-user nav_icon'></i> </div>-->
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" title="MLH Tracker" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">MLH Tracker</span> 
                </a>
                <div class="nav_list"> 
                    <a href="home.php" title="Dashboard" class="nav_link" id="home"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    
                    <a href="settings.php" title="settings" class="nav_link" id="settings"> 
                        <i class='bx bx-cog nav_icon'></i> 
                        <span class="nav_name">Settings</span> 
                    </a> 
                </div>
            </div> 
            <a href="../php/logout.php" title="logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <script src="asset/js/script.js"></script>