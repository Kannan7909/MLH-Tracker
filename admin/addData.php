<?php
include("sidebar.php");
require "php/getRegion.php";
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="add-data">
                    <div class="" id="region-msg" style="text-align: center;"></div>
                    <h4 class="text-center">Add Region</h4>
                    <form id="regionAdd" action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Region</label>
                            <textarea class="form-control" id="region" cols="5" rows="9" name="region" required placeholder="You can enter multiple regions by adding ','&#10;eg:- regname1,regname2,regname3,..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="add-data">
                    <div class="" id="lender-msg" style="text-align: center;"></div>
                    <h4 class="text-center">Add Lender</h4>                    
                    <form id="lenderAdd" action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Region</label>
                            <select class="form-control" id="regionId" name="region" required>
                                <option value="" selected>----Please Select----</option>
                                <?php
                                foreach($regions as $region){
                                    echo "<option value='$region[regionId]'>$region[region]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lender</label>
                            <textarea class="form-control" id="lender" cols="5" rows="5" name="lender" required placeholder="You can enter multiple lenders by adding ','&#10;eg:- lendname1,lendname2,lendname3,..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function(){
        $('#regionAdd').submit(function(e){
            e.preventDefault();

            const region = $('#region').val();

            $.ajax({
                type: 'POST',
                url: 'php/addRegion.php',
                data: { region: region, submit:1 },
                success: function(response) {
                    var msgDom = document.getElementById("region-msg")
                    msgDom.style.display = "block";
                    msgDom.innerText = "Region addedd succesfully"
                    msgDom.style.color = "green";
                    document.getElementById('region').value = "";

                    setTimeout(function(){
                        $("#region-msg").fadeOut('fast');
                    }, 3000);
                },
                error: function(error) {
                    alert('An error occurred while submitting the form!');
                }
            })
        })
    })


    $(document).ready(function(){
        $('#lenderAdd').submit(function(e){
            e.preventDefault();

            const regionId = $('#regionId').val();
            const lender = $('#lender').val();

            $.ajax({
                type: 'POST',
                url: 'php/addLender.php',
                data: { region: regionId, lender: lender, submit:1 },
                success: function(response) {
                    var msgDom = document.getElementById("lender-msg")
                    msgDom.style.display = "block";
                    msgDom.innerText = "Lenders addedd succesfully"
                    msgDom.style.color = "green";
                    document.getElementById('lender').value = "";
                    document.getElementById('regionId').value = "";
                    
                    setTimeout(function(){
                        $("#lender-msg").fadeOut('fast');
                    }, 3000);
                },
                error: function(error) {
                    alert('An error occurred while submitting the form!');
                }
            })
        })
    })
</script>