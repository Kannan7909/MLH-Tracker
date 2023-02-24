<?php
require "../config/databaseConnection.php";
require_once "php/admin.php";
$userObj = new admin();
$userId = $_GET['id'];
$users = $userObj->getUser($userId);
if(is_null($users)){
    echo "<h1 class='text-center'>User not found</h1>";
    exit;
}
?>

<main>
    <?php
    foreach($users as $user){ ?>
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'Tab1')">Personal Details</button>
		    <button class="tablinks" onclick="openTab(event, 'Tab2')">Regions & Lenders</button>
        </div>

        <div id="Tab1"  style="display:block" class="tabcontent">
            <div class="personal-details">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="<?php echo $user['firstName'];?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" value="<?php echo $user['company'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo $user['email'];?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="<?php echo $user['phone'];?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="form-outline">
                            <label class="form-label">Address</label>
                                <p class="form-control" readonly>
                                    <?php echo $user['address'];?>
                                </p>
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
                                <?php $regions = explode(',',$user['regions']); ?>
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
                                <?php $lenders = explode(',',$user['lenders']); ?>
                                <ul style="height: 284px; overflow-y: auto">
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
        <?php } ?>
</main>

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