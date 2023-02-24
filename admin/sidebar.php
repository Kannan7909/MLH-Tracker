<?php
session_start();
if(!$_SESSION['admin_loggedIn']){
    echo "<script>
        alert('Please login');
        window.location.href='index.php';
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
    <title>Admin || MLH Tracker</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <i class='bx bx-user nav_icon'></i></div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">MLH Tracker</span> 
                </a>
                <div class="nav_list"> 
                    <a href="home.php" class="nav_link" id="home"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="addData.php" class="nav_link" id="addData"> 
                        <i class='bx bx-plus nav_icon'></i> 
                        <span class="nav_name">Add Data</span> 
                    </a> 
                    <a href="viewData.php" class="nav_link" id="viewData"> 
                        <i class='bx bx-list-ul nav_icon'></i> 
                        <span class="nav_name">View Data</span> 
                    </a> 
                    <?php 
                    if($_SESSION['role']=='admin'){
                        ?>
                        <a href="users.php" class="nav_link" id="users"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Users</span> 
                        </a>
                    <?php } ?>
                    <a href="settings.php" class="nav_link" id="settings"> 
                        <i class='bx bx-cog nav_icon'></i> 
                        <span class="nav_name">Settings</span> 
                    </a> 
                    <!--
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Files</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a> 
                    -->
                </div>
            </div> 
            <a href="index.php" title="Logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <script src="asset/js/script.js"></script>