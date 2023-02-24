<?php
include("sidebar.php");
require "php/getRegion.php";

?>

<main>
    <div class="container">
        <h2 class="text-center">Regions and Lenders</h2>
        <div class="row">
            <div class="col-sm-4" style="border: 1px solid black; border-radius: 10px; padding: 5px; margin-right:30px">
                <h4 class="text-center">Regions</h4>
                <hr>
                <ul>
                    <?php
                    foreach($regions as $region){
                    ?>
                        <li><?php echo $region['region']; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-7" style="border: 1px solid black; border-radius: 10px; padding: 5px">
                <h4 class="text-center">Lenders</h4>
                <hr>
                <label for="" class="form-label">Region</label>
                <select class="form-control" id="regionId" name="region" required>
                    <?php
                    foreach($regions as $region){
                        echo "<option value='$region[regionId]'>$region[region]</option>";
                    }
                    ?>
                </select>
                
                <div class="lender-row" style="margin-top: 20px;">
                    <ul id="lenders"></ul>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script>

    function ajaxSubmit(data){
        $.ajax({
            type: "POST",
            url: "../php/getLender.php",    
            data: { data: JSON.stringify(data) },
            success: function(response) {
                var lenders = JSON.parse(response); 
                const ul = document.querySelector('#lenders');
                ul.innerHTML = ""
                lenders.forEach(lender => {
                    const li = document.createElement('li');
                    li.textContent = lender.lender;
                    ul.appendChild(li);
                });

            }
        });
    }

    var region = document.getElementById("regionId");

    region.selectedIndex = 0;
    var selectedValue = region.value;
    ajaxSubmit(selectedValue)

    region.onchange = (e)=>{
        var selectedValue = region.value;
        
        ajaxSubmit(selectedValue)
    }

</script>