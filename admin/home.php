<?php
include("sidebar.php");
require "php/getRegisteredUser.php";

?>

<main>    
    <div class="container">
        <h3 class="text-center" style="margin: 40px 0;">Registered Customers</h3>
        <div class="customers">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($users as $user){ 
                            if($user["firstName"]==""){
                                echo "<h1 class='text-center'>Users not found</h1>";
                                exit;
                            }
                            ?>
                            <tr>
                                <td><?php echo $user['firstName'];?></td>
                                <td><?php echo $user['company'];?></td>
                                <td><?php echo $user['phone'];?></td>
                                <td><?php echo $user['email'];?></td>
                                <td><?php echo $user['address'];?></td>
                                <td>                                    
                                    <button class='btn btn-primary btn-sm' onclick="openModal(<?php echo $user['customerId'];?>)" data-bs-toggle="modal" data-bs-target="#myModal"><i class='bx bx-show'></i></button>
                                    <?php
                                        if($user['status']==0){
                                            echo "<a href='php/customerActions.php?action=activate&userId=$user[customerId]'>
                                                <button class='btn btn-success btn-sm'>Activate</button>
                                            </a>";
                                        }
                                        else{
                                            echo "<a href='php/customerActions.php?action=deactivate&userId=$user[customerId]'>
                                                <button class='btn btn-success btn-sm'>Deactivate</button>
                                            </a>";
                                        }
                                    ?>
                                    <a href="php/customerActions.php?action=delete&userId=<?php echo $user['customerId']; ?>">
                                        <button class='btn btn-danger btn-sm'><i class='bx bx-trash'></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id){
            $('#myModal').on('shown.bs.modal', function () {
                $.ajax({
                    url: `userDetails.php?id=${id}`,
                    success: function(data) {
                        $('#myModal .modal-body').html(data);
                    }
                });
            });
        }
    </script>

</main>

</div>
</body>
</html>