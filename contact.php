<?php
include("header.php");
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="banner">
    <img src="asset/images/banner-contact-mlh-tracker.jpg" class="banner-img" alt="banner-img">
	<div class="centered">
		<h1 class="text-center banner-head">Contact Us</h1>
		<!--<p class="text-center banner-sub-head">
			sub Heading
		</p>-->
	</div>
</div>
<br><br>

<main>
    <div class="container">
        <!-- Section 1-->
        <section>
            <div class="contact-section-1">
                <div class="overlay">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="text-center">Get in touch</h3>
                            <p class="text-center">
                                <i class="fa fa-home"></i> &nbsp;338 New Road, London, SE57 4HJ
                            </p>
                            <p class="text-center">
                                <i class="fa fa-phone"></i> &nbsp;+44 20 7234 3456
                            </p>
                            <p class="text-center">
                                <i class="fa fa-envelope"></i> &nbsp;abc@gmail.com
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="contact-form">
                                <form id="contact-form">
                                    <div id="msg" class="text-center"></div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="firstName">First name <span class="require-star">*</span></label>
                                                <input type="text" id="firstName" name="firstName" class="form-control" required />
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="lastName">Last name <span class="require-star">*</span></label>
                                                <input type="text" id="lastName" name="lastName" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="email">Email Id <span class="require-star">*</span></label>
                                                <input type="text" id="email" name="email" class="form-control" required />
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-outline">
                                                <label class="form-label" for="phone">Phone <span class="require-star">*</span></label>
                                                <input type="number" id="phone" name="phone" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="message">Message <span class="require-star">*</span></label>
                                        <textarea class="form-control" name="message" col="3" rows="4" required></textarea>
                                        <input type="hidden" name="submit" value="1">
                                    </div>
                                    <button type="submit" name="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 1 End-->
        <span class="spacer"></span>
    </div>
    
</main>

<script>
    $(document).ready(function() {                
        $("#contact-form").submit(function(event) {  
            event.preventDefault();
            $.ajax({
                url: "php/contactAction.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    document.getElementById("msg").style.display = "block"
                    document.getElementById("msg").style.color = "green"
                    document.getElementById("msg").innerText = "Thank you for contacting us!"
                    document.getElementById("submitBtn").disabled = true;

                    const form = document.getElementById("contact-form")

                    form.reset();

                    setTimeout(function(){
                        $("#msg").fadeOut('fast');
                        document.getElementById("submitBtn").disabled = false;
                    }, 3000);
                    
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occurred
                    console.log("Error:-"+error);
                }
            });
        });
    });    
</script>

<?php
include("footer.php"); 
?>
