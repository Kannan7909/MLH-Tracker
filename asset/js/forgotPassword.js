$(document).ready(function(){
    $('#forgotPassword-form').submit(function(e){
        e.preventDefault();

        const email = $('#email').val();

        $.ajax({
            type: 'POST',
            url: 'php/checkUser.php',
            data: { email: email, submit:1 },
            success: function(response) {
                if(response==0){
                    document.getElementById("error-msg").innerText = "Sorry your email id not exist in our database";
                    document.getElementById("error-msg").style.color = "red";

                    setTimeout(function(){
                        $("#error-msg").fadeOut('fast');
                    }, 3000);
                    document.getElementById('email').value = ""
                }
                else{
                    document.getElementById("email_submit").disabled = true;
                    $.ajax({
                        type: 'POST',
                        url: 'php/sendOtpEmailFrgtPswd.php',
                        data: { email: email },
                        success: function(response) {
                            document.getElementById("email_verification").style.display = "none"
                            document.getElementById("otp_verification").style.display = "flex"
                            document.getElementById("email_id").innerText = email
                        },
                        error: function(error) {
                            alert('Send mail');
                        }
                    })
                }
            },
            error: function(error) {
                console.error(error);
                alert('An error occurred while submitting the form!');
            }
        })
    })
})


$(document).ready(function(){
    $('#validation-form').submit(function(e){
        e.preventDefault();

        const email = $('#email').val();
        const otp = $('#otp').val()
        $.ajax({
            type: 'POST',
            url: 'php/otpVerification.php',
            data: { email: email, OTP:otp, submit:1 },
            success: function(response) {
                if(response==0){
                    document.getElementById("error-msg1").innerText = "You entered wrong otp";
                    document.getElementById("error-msg1").style.color = "red";

                    setTimeout(function(){
                        $("#error-msg").fadeOut('fast');
                    }, 3000);
                }
                else{
                    document.getElementById("otp_submit").disabled = true;
                    $.ajax({
                        type: 'POST',
                        url: 'php/sendOtpEmailFrgtPswd.php',
                        data: { email: email },
                        success: function(response) {
                            document.getElementById("email_verification").style.display = "none"
                            document.getElementById("otp_verification").style.display = "none"
                            document.getElementById("new_password").style.display = "flex"
                        },
                        error: function(error) {
                            alert('Send mail');
                        }
                    })
                }
            },
            error: function(error) {
                console.error(error);
                alert('An error occurred while submitting the form!');
            }
        })
    })
})

$(document).ready(function(){
    $('#password-form').submit(function(e){
        e.preventDefault();
        document.getElementById("password_change").style.disabled = true;
        const email = $('#email').val();
        const password = $('#password').val();
        console.log(email);
        console.log(password);
        $.ajax({
            type: 'POST',
            url: 'php/addNewPassword.php',
            data: { email: email, password:password, submit:1 },
            success: function(response) {
                document.getElementById("email_verification").style.display = "none"
                document.getElementById("otp_verification").style.display = "none"
                document.getElementById("new_password").style.display = "none"
                document.getElementById("password_changed").style.display = "flex"
            },
            error: function(error) {
                console.error(error);
                alert('An error occurred while submitting the form!');
            }
        })
    })
})

var pswd = document.getElementById("password");

var checkLen = false
var checkNum = false
var checkSpcl = false
var checkSpcl = false
var checkPswd = false
pswd.onchange = (e)=>{
    var length = e.target.value.length;    
    checkPswd = false
    if (length<8 || length>16) {
        document.getElementById("len_message").style.display = "block";
        document.getElementById("len_message").innerText = "Password must be 8-16 characters";
        checkLen = false
    } 
    else{
        document.getElementById("len_message").style.display = "none";
        checkLen = true
    }

    const containNumber = /\d/;
    if(!containNumber.test(e.target.value)){
        document.getElementById("num_message").style.display = "block";
        document.getElementById("num_message").innerText = "Password must contain numbers";
        checkNum = false;
    }
    else{
        document.getElementById("num_message").style.display = "none";
        checkNum = true
    }

    const containSpecl = /[!@#$%^&*(),.?":{}|<>]/;
    if(!containSpecl.test(e.target.value)){
        document.getElementById("spcl_message").style.display = "block";
        document.getElementById("spcl_message").innerText = "Password must contain special characters";
        checkSpcl = false
    }
    else{
        document.getElementById("spcl_message").style.display = "none";
        checkSpcl = true
    }
            
    if(checkNum && checkPswd && checkSpcl && checkLen){
        document.getElementById("password_change").disabled = false;
    }
    else{
        document.getElementById("password_change").disabled = true;
    }
}
        
var cPassword = document.getElementById("confirmPassword");
  
document.getElementById("password_change").disabled = true;
cPassword.onchange = (e)=>{
    password = document.getElementById("password").value;
    confirmPassword = e.target.value;
    if(password!=confirmPassword){
        document.getElementById("error-msg2").style.display = "block";
        document.getElementById("error-msg2").style.color = "red";
        document.getElementById("error-msg2").innerText = "Password not match";
        checkPswd = false
    }
    else{
        document.getElementById("error-msg2").innerText = "";
        checkPswd = true
    }
    if(checkNum && checkPswd && checkSpcl && checkLen){
        document.getElementById("password_change").disabled = false;
    }
    else{
        document.getElementById("password_change").disabled = true;
    }
}
        
if(checkNum && checkPswd && checkSpcl && checkLen){
    document.getElementById("password_change").disabled = false;
}
else{
    document.getElementById("password_change").disabled = true;
}
    
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