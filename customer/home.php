<?php
include("sidebar.php");
$userId = $_SESSION['userId'];
require "../config/databaseConnection.php";
require_once "../php/user.php";
$userObj = new user();
$customerDetails = $userObj->getUser($userId);
if($customerDetails == ''){
    header("Location: ../php/logout.php");
}
?>
<link rel="stylesheet" href="asset/css/tab.css"/>
<main>    
    <div class="container">
        <!--<h3 class="text-center">Personal Details</h3>-->
        <div class="person_details">
            <div class="tab">
		        <button class="tablinks active" onclick="openTab(event, 'Tab1')">Personal Details</button>
		        <button class="tablinks" onclick="openTab(event, 'Tab2')">Regions & Lenders</button>
	        </div>

	        <div id="Tab1" style="display:block" class="tabcontent">
                <div class="details">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="<?php echo $customerDetails['firstName'];?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $customerDetails['lastName'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" value="<?php echo $customerDetails['email'];?>" readonly>
                                <?php
                                if($customerDetails['emailValidation']!=1){
                                    echo "<p onclick='sendMailAndPageLoad($customerDetails[customerId])' style='color: red; font-size:15px'>Please validate your email id <a href='../php/sendMail.php?id=$customerDetails[customerId]'>click this link</a></p>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="<?php echo $customerDetails['phone'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Address</label>
                                <p class="form-control" style="cursor: text;" readonly>
                                    <?php echo $customerDetails['address'];?>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" value="<?php echo $customerDetails['company'];?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>

	        <div id="Tab2" class="tabcontent">
                <div class="regions-lenders">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Regions</label>
                                <?php $regions = explode(',',$customerDetails['regions']); ?>
                                <ul>
                                    <?php
                                    foreach($regions as $region){
                                    ?>
                                        <li><?php echo $region; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label">Lenders</label>
                                <?php $lenders = explode(',',$customerDetails['lenders']); ?>
                                <ul style="height: 235px; overflow-y: auto">
                                    <?php
                                    foreach($lenders as $lender){
                                    ?>
                                        <li><?php echo $lender; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
        </div>
    </div>
</main>

</div>
    <!--Container Main end-->
    <script>
		function openTab(evt, tabName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.className += " active";
		}

	</script>
</body>
</html>