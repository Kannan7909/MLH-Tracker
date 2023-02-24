<?php
include("header.php");
require "php/getRegion.php";
?>
<link rel="stylesheet" href="asset/css/multiStepForm.css">
<link rel="stylesheet" href="asset/css/addressline.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="banner">
    <img src="asset/images/banner-subscribe-mlh-tracker.jpg" class="banner-img" alt="banner-img">
	<div class="centered">
		<h1 class="text-center banner-head">Sign Up and Start your 6 Month Free Trial</h1>
		<p class="text-center banner-sub-head">
			
		</p>
	</div>
</div>
<br><br>

<main>
    <div class="container">
        <!-- Section 1-->
        <section>
            <div class="subscribe-section-1">
                <div class="row">
                    <div class="col-sm-5">
                        <!--<h2>Start your 6 Month Free Trial</h2>-->
                        <p>
                        With MLH Tracker you can easily compare the updates made by mortgage lenders in Part 2 of their Handbook. Once you subscribe to our service, we will promptly notify you via email of any relevant changes made by the selected CML lenders in Part 2. This makes it easier for you to compare the updates and stay up to date with any new requirements or guidelines. 
                        You can subscribe to the MLH tracker by: 
                        <br><br>
                        <i class="fa fa-check"></i> &nbsp;&nbsp;Sign up for your account
                        <br>
                        <i class="fa fa-check"></i> &nbsp;&nbsp;Select the Region and Lender
                        <br>
                        <i class="fa fa-check"></i> &nbsp;&nbsp;Done
                        </p>
                    </div>
                    <div class="col-sm-7">
                        <div class="reg-form">
                            <h3 class="text-center">
                                Sign Up & Start Your Free Trial
                            </h3>
                            <h6 class="text-center"><span>Quick Sign Up</span></h6>
                            <div id="err_msg" class="text-center"></div>
                            <form action="" id="regForm">
                                <div class="tab">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstName">
                                                    First name
                                                    <span class="require-star">*</span>
                                                </label>
                                                <input type="text" id="firstName" name="firstName" class="form-control required" required  pattern="[A-Za-z]+"/>
                                                <div id="firstName_error" style="color: red;"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="lastName">Last name</label>
                                                <input type="text" id="lastName" name="lastName" class="form-control" />
                                                <div id="lasttName_error" style="color: red;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4" style="margin-bottom: 0px !important;">
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">Email Id <span class="require-star">*</span></label>
                                                <input type="text" id="email" name="email" class="form-control required" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="phone">Phone <span class="require-star">*</span></label>
                                                <input type="number" id="phone" name="phone" class="form-control required" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <p id="email_error" style="font-size: 10px; color: red" class="text-center"></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="phone_error" style="font-size: 10px; color: red" class="text-center"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">                                        
                                            <div class="form-outline">
                                                <label class="form-label" for="password">Password <span class="require-star">*</span></label>
                                                <div class="row" style="align-items: center;">
                                                    <div class="col-sm-11">
                                                        <input type="password" id="password" name="password" class="form-control required" required>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <i class="fa fa-eye-slash" id="showPassword" style="cursor: pointer; float:right"></i>
                                                    </div>
                                                </div>
                                                <p style="font-size: 10px;">
                                                    Password must be 8-16 characters and contain both numbers and letters/special characters
                                                </p>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="company">Confirm Password <span class="require-star">*</span></label>
                                                <div class="row" style="align-items: center;">
                                                    <div class="col-sm-11">
                                                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control required" required>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <i class='fa fa-eye-slash' id="confirmshowPassword" style="cursor: pointer; float:right"></i>
                                                    </div>
                                                </div>
                                                <p style="font-size: 10px; margin-top: 40px"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4" style="margin-top: -40px;">
                                        <div class="col">
                                            <div id="len_message" style="color: red; font-size: 10px;"></div>
                                            <div id="num_message" style="color: red; font-size: 10px;"></div>
                                            <div id="spcl_message" style="color: red; font-size: 10px;"></div>
                                        </div>
                                        <div class="col">
                                            <div id="message" style="color: red; font-size: 10px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <div id="context" style="margin-top: 100px;"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="company">Address First Line <span class="require-star">*</span></label>
                                                <input type="text" id="line_1" name="line_1" class="form-control required" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="address">Address Second Line</label>
                                                <input type="text" id="line_2" name="line_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="company">Address Third Line</label>
                                                <input type="text" id="line_3" name="line_3" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="address">Town or City <span class="require-star">*</span></label>
                                                <input type="text" id="post_town" name="post_town" class="form-control required" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="company">Postcode <span class="require-star">*</span></label>
                                                <input type="text" id="postcode" name="postcode" class="form-control required" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="company">Company <span class="require-star">*</span></label>
                                        <input type="text" id="company" name="company" class="form-control required" required>
                                    </div>                                    
                                </div>
                                <div class="tab">
                                    <input type="hidden" name="submit" value="1">
                                    <div class="form-outline" id="region-col">
                                        <label class="form-label" for="form3Example1">Region <span class="require-star">*</span></label>
                                        <br>
                                        <span id="reg" style="display: none;"><?php echo json_encode($regions); ?></span>
                                        <select class="selectpicker form-control" id="region" name="region[]" multiple required data-actions-box="true" data-select-all-text="Select All" data-deselect-all-text="Deselect All">
                                            <?php
                                                foreach($regions as $region){
                                                    echo "<option value='$region[regionId]'>$region[region]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-outline" id="lender-col">
                                        <label class="form-label" for="form3Example2">Lender <span class="require-star">*</span></label>
                                        <br>
                                        <select class="selectpicker form-control" id="lenders" name="lender[]" multiple required data-actions-box="true" data-select-all-text="Select All" data-deselect-all-text="Deselect All">>
                                        </select>
                                    </div>
                                </div>
                                <div style="overflow:auto; margin-top: 10px;">
                                    <div>                                        
                                        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="nextPrev(-1)">Previous</button>
                                        <div style="float: right;">
                                            <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)">Next</button>
                                            <button type="submit" id="submitBtn" name="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                
                                <!--<button type="submit" name="submit" id="submitButton" class="btn btn-primary">Submit</button>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 1 End --->
        <span class="spacer"></span>

        
        <span class="spacer"></span>
        
        <section>
            <div class="updates" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="updates-content">
                            <h5 class="text-center">Instant email alerts when a Lender makes an update.</h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="updates-content">
                            <h5 class="text-center">Get the date of the last update made by a Lender</h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="updates-content">
                            <h5 class="text-center">Stay informed about the exact changes made by the lender.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 3-->
        <!--<section>
            <div class="subscribe-section-3">
                <h1 class="text-center">Heading 3</h1>
                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam facilis delectus quaerat itaque, error ut?
                </p>
            </div>
        </section>-->
        <!-- Section 3 End --->
        <span class="spacer"></span>

    </div>

    
</main>

<script>
    $(document).ready(function() {                
        $("#regForm").submit(function(event) {  
            event.preventDefault();
            document.getElementById("submitBtn").disabled = true
            document.getElementById("err_msg").style.display = "block"
            document.getElementById("err_msg").style.color = "green"
            document.getElementById("err_msg").innerText = "Submitting the form please wait...."
            $.ajax({
                url: "php/registerAction.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if(response==0){
                        document.getElementById("err_msg").style.display = "block"
                        document.getElementById("err_msg").style.color = "red"
                        document.getElementById("err_msg").innerText = "Email id Already Existed Please login"
                        document.getElementById("submitBtn").disabled = false
                        setTimeout(function(){
                            $("#err_msg").fadeOut('fast');
                        }, 3000);
                    }
                    else{
                        window.location.href=`php/mailVerification.php?id=${response}`;
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occurred
                    console.log("Error:-"+error);
                }
            });
        });
    });

    document.getElementById('showPassword').onclick = (e) => {
        passwordInput = document.getElementById("password")
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById('showPassword').classList.remove("fa-eye-slash");
            document.getElementById('showPassword').classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            document.getElementById('showPassword').classList.remove("fa-eye");
            document.getElementById('showPassword').classList.add("fa-eye-slash");
        }
    }

    document.getElementById('confirmshowPassword').onclick = (e) => {        
        passwordInput = document.getElementById("confirmPassword")
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            document.getElementById('confirmshowPassword').classList.remove("fa-eye-slash");
            document.getElementById('confirmshowPassword').classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            document.getElementById('confirmshowPassword').classList.remove("fa-eye");
            document.getElementById('confirmshowPassword').classList.add("fa-eye-slash");
        }
    }

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
            document.getElementById("nextBtn").disabled = false;
        }
        else{
            document.getElementById("nextBtn").disabled = true;
        }
    }
    
    var cPassword = document.getElementById("confirmPassword");
    
    document.getElementById("nextBtn").disabled = true;
    cPassword.onchange = (e)=>{
        password = document.getElementById("password").value;
        confirmPassword = e.target.value;
        if(password!=confirmPassword){
            document.getElementById("message").style.display = "block";
            document.getElementById("message").innerText = "Password not match";
            checkPswd = false
        }
        else{
            document.getElementById("message").style.display = "none";
            checkPswd = true
        }
        if(checkNum && checkPswd && checkSpcl && checkLen){
            document.getElementById("nextBtn").disabled = false;
        }
        else{
            document.getElementById("nextBtn").disabled = true;
        }
    }
    
    if(checkNum && checkPswd && checkSpcl && checkLen){
        document.getElementById("nextBtn").disabled = false;
    }
    else{
        document.getElementById("nextBtn").disabled = true;
    }

</script>

<script src="asset/js/multiStepForm.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@ideal-postcodes/postcode-lookup-bundled@2/dist/postcode-lookup.esm.js"></script>
<script type="module" src="asset/js/addressLine.js"></script>
<?php
include("footer.php");
?>