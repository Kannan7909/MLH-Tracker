<?php
session_start();
if(isset($_SESSION['customer_loggedIn'])){
	$customerLogin = $_SESSION['customer_loggedIn'];
}
else{
	$customerLogin = false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/images/mlh_logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
    <link rel="stylesheet" href="asset/css/style.css"/>
    <title>MLH Tracker</title>
</head>
<body>    
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<div class="container">
    		<a class="navbar-brand" href="index.php">
				<p style="color: #fff; font-size: 25px; display:flex; flex-direction:row;align-items: end; ">
					<img src="asset/images//mlh_logo_white.png" alt="..." height="100">&nbsp;
					<span style="font-size: 20px;"> MLH Tracker</span>
				</p>
      			<!--
					
				-->
    		</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav ms-auto">
        			<li class="nav-item">
          				<a class="nav-link" id="index" aria-current="page" href="index.php">Home</a>
        			</li>
        			<li class="nav-item">
          				<a class="nav-link" id="about" href="about.php">About Us</a>
        			</li>					
        			<li class="nav-item">
          				<a class="nav-link" id="subscribe" href="subscribe.php">Subscribe</a>
        			</li>
        			<li class="nav-item">
          				<a class="nav-link" id="pricing" href="pricing.php">Pricing</a>
        			</li>
        			<li class="nav-item">
          				<a class="nav-link" id="contact" href="contact.php">Contact Us</a>
        			</li>
					<?php
					if($customerLogin){
						echo '<li class="nav-item">
								<a class="nav-link" id="logout" href="php/logout.php">Logout</a>
				  			</li>
							  <li class="nav-item">
							  <a class="nav-link" id="logout" href="customer/home.php">Dashboard</a>
							</li>';
					}
					else{
						echo '<li class="nav-item">
								<a class="nav-link" id="login" href="login.php">Login</a>
				  			</li>';
					}
					?>  
					<li class="nav-item">
						<a class="nav-link" target="_blank" id="logout" href="MLH_TRACKER.pdf">User Guide</a>
				  	</li>      			        		
      			</ul>
    		</div>
  		</div>
	</nav>
	