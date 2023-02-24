<?php
if(isset($_GET['id'])){
    require "../config/databaseConnection.php";
    require_once "user.php";
    $userObj = new user();
    $customerDetails = $userObj->getUser($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../asset/images/UKFinanceLogo.jpg"/>
    <title>Login</title>
    <link rel="stylesheet" href="../asset/css/index.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>
<body>
    <section class="login">
        <div class="login-form">
            <div class="text-center">
                <h3>Verify your Email address</h3>
                <p id="message">Please enter the OTP that we have sent to your inbox</p>
            </div>
            <form autocomplete="off" id="mail-validation-form">
                <div class="form-outline mb-4">
                    <label class="form-label" for="address">Email <span class="require-star" style="color:red">*</span></label>
                    <span id="re-otp" style="display: none"><?php echo $customerDetails['otp']; ?></span>
                    <input type="hidden" id="customerId" name="customerId" value="<?php echo $customerDetails['customerId']; ?>">
                    <input type="text" id="emailId" name="emailId" class="form-control" value="<?php echo $customerDetails['email']; ?>" readonly>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="company">OTP <span class="require-star">*</span></label>
                    <input type="number" id="otp" name="otp" class="form-control" required>
                    <div id="error-msg" style="color: red;text-align:center"></div>
                    <div class="d-flex flex-row text-center">
                        <button type="button" id="resendOtp" class="btn btn-primary btn-sm" style="margin-top: 10px;" disabled>Resend OTP</button>
                        &nbsp;&nbsp;
                        <div id="timer" style="margin-top: 10px;"></div>
                    </div>
                </div>
                
                <div style="float: left; margin-top: 20px">
                    <a href="../subscribe.php">
                        <button type="button" name="submit" class="btn btn-outline-danger btn-block mb-4">Cancel</button>
                    </a>
                </div>
                <div style="float: right; margin-top: 20px">
                    <button type="submit" name="submit" class="btn btn-outline-success btn-block mb-4">Sign in</button>
                </div>
            </form>
        </div>
    </section>   

    <script>
        
        const button = document.querySelector('#resendOtp');
        const timerDisplay = document.querySelector('#timer');

        function countDown(){
            let count = 30;
            var countdown = setInterval(function() {
                count--;
                //timerDisplay.innerHTML = count + " seconds left";
                if (count === 0) {
                    clearInterval(countdown);
                    button.disabled = false;
                }
                else{
                    button.disabled = true;
                }
            }, 1000);
        }

        countDown();
  
        //OTP resend function
        var resendBtn = document.getElementById("resendOtp");

        resendBtn.onclick = (e)=>{
            const otp = document.getElementById("re-otp").innerText;
            const emailId = document.getElementById("emailId").value;
            countDown();    
            $.ajax({
                type: "POST",
                url: "sendMail.php",
                data: {'otp':otp,'email':emailId},
                success: function(response) {
                    document.getElementById("message").innerText = "We have send a new OTP your inbox please check..";
                    document.getElementById("message").style.color = "red"
                }
            });
        }


        //form submit
        $(document).ready(function(){
            $("#mail-validation-form").submit(function(e){
                e.preventDefault(); 
                var formData = $("#mail-validation-form").serialize();
                $.ajax({
                    type: "POST",
                    url: "validationAction.php",
                    data: formData,
                    success: function(data) {
                        console.log(data)
                        if(data==1){
                            console.log(data);
                            window.location.href = '../customer/home.php';
                        }
                        else{
                            document.getElementById("error-msg").innerText = "Please enter valid otp"
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php
}
else{
    header("Location: ../subscribe.php");
}
?>