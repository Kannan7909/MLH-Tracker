<?php
include("sidebar.php");
require "php/getRegion.php";
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="add-data">
                    <h4 class="text-center">Add Region</h4>
                    <form action="php/addRegion.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Region</label>
                            <textarea class="form-control" cols="5" rows="9" name="region" required placeholder="please eneter the value with ','&#10;eg:- regname1,regname2,regname3,..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="add-data">
                    <h4 class="text-center">Add Lender</h4>                    
                    <form action="php/addLender.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Region</label>
                            <select class="form-control" name="region" required>
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
                            <textarea class="form-control" cols="5" rows="5" name="lender" required placeholder="please eneter the value with ','&#10;eg:- lendname1,lendname2,lendname3,..."></textarea>
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