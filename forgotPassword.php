<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/images/mlh_logo.png"/>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="asset/css/index.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>
<body>
    <section class="login" id="email_verification">
        <div class="login-form">
            <div class="text-center">
                <img src="asset//images/mlh_logo.png" class="logo"/>    
            </div>
            <form autocomplete="off" id="forgotPassword-form" style="margin-top: 20px;">
                <h3>Password assistance</h3>
                <p style="font-size: 13px;">Enter the email address associated with your MLH Tracker account.</p>
                <div class="form-outline mb-4">
                    <label class="form-label" for="user-name">Email</label>
                    <input type="email" id="email" name="email" class="form-control" autocomplete="off" placeholder="Enter your email id" required/>
                    <div id="error-msg" class="text-center" style="font-size: 13px;"></div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="submit" id="email_submit" class="btn btn-primary mb-3">Submit</button>    
                </div>
                <p class="text-center">Return to home page<a href="subscribe.php"> Click this link</a></p>
            </form>
        </div>
    </section>   

    <section class="login" id="otp_verification" style="display: none;">
        <div class="login-form">
            <div class="text-center">
                <img src="asset//images/mlh_logo.png" class="logo"/>    
            </div>
            <form autocomplete="off" id="validation-form" style="margin-top: 20px;">
                <h3>Verification required</h3>
                <p style="font-size: 13px;">To continue, complete this verification step. We've sent an OTP to the email <span id="email_id"></span> Please enter it below to complete verification.</p>
                <div class="form-outline mb-4">
                    <label class="form-label" for="user-name">Enter OTP</label>
                    <input type="number" id="otp" name="otp" class="form-control" autocomplete="off" required/>
                    <div id="error-msg1" class="text-center" style="font-size: 13px;"></div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="submit" id="otp_submit" class="btn btn-primary btn-block mb-4" style="float: right">Submit</button>    
                </div>
            </form>
        </div>
    </section>   

    <section class="login" id="new_password" style="display: none;">
        <div class="login-form">
            <div class="text-center">
                <img src="asset//images/mlh_logo.png" class="logo"/>    
            </div>
            <form autocomplete="off" id="password-form" style="margin-top: 40px;">
                <div class="form-outline mb-4">
                    <label class="form-label" for="user-name">Enter New Password</label>
                    <div class="row" style="align-items: center;">
                        <div class="col-sm-11">
                            <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Enter your password" required/>
                        </div>
                        <div class="col-sm-1">
                            <i class='bx bx-hide nav_icon' id="showPassword" style="cursor: pointer; float:right"></i>
                        </div>
                    </div>
                    <p style="font-size: 10px; color:red">
                        Password must be 8-16 characters and contain both numbers and letters/special characters
                    </p>
                    <div id="len_message" style="color: red; font-size: 10px;"></div>
                    <div id="num_message" style="color: red; font-size: 10px;"></div>
                    <div id="spcl_message" style="color: red; font-size: 10px;"></div>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="user-name">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Enter password" autocomplete="off" required/>
                    <div id="error-msg2" class="text-center" style="font-size: 13px;"></div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="submit" id="password_change" class="btn btn-primary btn-block mb-4" style="float: right">Submit</button>    
                </div>
            </form>
        </div>
    </section>   

    <section class="login" id="password_changed" style="display: none;">
        <div class="login-form">
            <div class="text-center">
                <img src="asset//images/mlh_logo.png" class="logo"/>    
            </div>
            <p style="margin-top: 20px; font-size: 20px; color: green" class="text-center">Password reset successfull</p>
            <div class="text-center">
                <a href="login.php"><button class="btn btn-success">Login</button></a>
            </div>
        </div>
    </section>   
    <script src="asset/js/forgotPassword.js"></script>
</body>
</html>