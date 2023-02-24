<?php
include("sidebar.php");
?>

<main>
    <div class="container">
        <h1>Settings</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="change-password" style="border: 1px solid black; border-radius: 10px;padding: 10px">
                    <p class="text-center">Change Password</p>
                    <div id="msg" class="text-center"></div>
                    <form id="change-password">
                        <div class="mb-3">
                            <label for="" class="form-label">Old Password <span class="require-star">*</span></label>
                            <div class="row" style="align-items: center;">
                                <div class="col-sm-11">
                                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" aria-describedby="emailHelp" required>
                                </div>
                                <div class="col-sm-1">
                                    <i class='bx bx-hide nav_icon' id="showPassword" style="cursor: pointer; float:right"></i>
                                </div>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">New Password <span class="require-star">*</span></label>
                            <div class="row" style="align-items: center;">
                                <div class="col-sm-11">
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                                </div>
                                <div class="col-sm-1">
                                    <i class='bx bx-hide nav_icon' id="newShowPassword" style="cursor: pointer; float:right"></i>
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function(){
        $('#change-password').submit(function(e){
            e.preventDefault();

            const oldPassword = $('#oldPassword').val();
            const newPassword = $('#newPassword').val();
                
            $.ajax({
                type: 'POST',
                url: '../php/changePassword.php',
                data: { oldPassword: oldPassword, newPassword: newPassword, submit:1 },
                success: function(response) {
                    if(response==0){
                        document.getElementById("msg").style.color = "red";
                        document.getElementById("msg").innerText = "Old password is not correct";
                        
                        setTimeout(function(){
                            $("#msg").fadeOut('fast');
                        }, 3000);
                        
                    }
                    else{
                        document.getElementById("msg").style.color = "green";
                        document.getElementById("msg").innerText = "Password changed";
                        setTimeout(function(){
                            $("#msg").fadeOut('fast');
                        }, 3000);
                        
                        document.getElementById("oldPassword").value = ""
                        document.getElementById("newPassword").value = ""
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
        passwordInput = document.getElementById("oldPassword")
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

    document.getElementById('newShowPassword').onclick = (e) => {
        passwordInput = document.getElementById("newPassword")
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById('newShowPassword').classList.remove("bx-hide");
            document.getElementById('newShowPassword').classList.add("bx-show");
        } else {
            passwordInput.type = "password";
            document.getElementById('newShowPassword').classList.remove("bx-show");
            document.getElementById('newShowPassword').classList.add("bx-hide");
        }
    }
</script>
