<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/images/mlh_logo.png"/>
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/index.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>
<body>
    <section class="login">
        <div class="login-form">
            <div class="text-center">
                <img src="asset//images/mlh_logo.png" class="logo"/>    
            </div>
            <form autocomplete="off" id="login-form" style="display: flex; flex-direction:column">
                <div class="form-outline mb-4">
                    <label class="form-label" for="user-name">Username</label>
                    <input type="email" id="userName" name="userName" class="form-control" autocomplete="off" placeholder="Enter your email id" required/>
                </div>

                <div class="form-outline mb-2">
                    <label class="form-label" for="password">Password</label>
                    <div class="row" style="align-items: center;">
                        <div class="col-sm-11">
                            <input type="password" id="password" name="password" class="form-control" autocomplete="off"  placeholder="Enter your password" required/>
                        </div>
                        <div class="col-sm-1">
                            <i class='bx bx-hide nav_icon' id="showPassword" style="cursor: pointer; float:right"></i>
                        </div>
                        <a href="forgotPassword.php"><p class="" style="float: right;">Forgot password</p></a>
                    </div>
                    <div id="error-msg" style="color: red;text-align:center"></div>
                </div>
                
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Login</button>    
                </div>
                <p class="text-center">New here?<a href="subscribe.php"> Create an account</a></p>
                
            </form>
            
        </div>
    </section>   
    
    <script>
        $(document).ready(function(){
            $('#login-form').submit(function(e){
                e.preventDefault();

                const username = $('#userName').val();
                const password = $('#password').val();

                $.ajax({
                    type: 'POST',
                    url: 'php/loginAction.php',
                    data: { userName: username, password: password, submit:1 },
                    success: function(response) {
                        if(response==0){
                            document.getElementById("error-msg").innerText = "Invalid username or password";
                            setTimeout(function(){
                                $("#error-msg").fadeOut('fast');
                            }, 3000);
                        }
                        else{
                            window.location.href = 'customer/home.php';
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        alert('An error occurred while submitting the form!');
                    }
                })
            })
        })

        document.getElementById('showPassword').onclick = (e) => {
            passwordInput = document.getElementById("password")
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                document.getElementById('showPassword').classList.remove("bx-hide");
                document.getElementById('showPassword').classList.add("bx-show");
            } else {
                passwordInput.type = "password";
                document.getElementById('showPassword').classList.remove("bx-show");
                document.getElementById('showPassword').classList.add("bx-hide");
            }
        }

    </script>
</body>
</html>