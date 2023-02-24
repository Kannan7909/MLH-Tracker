<?php
include("sidebar.php");
require "php/getUsers.php";
?>

<main>    
    <div class="container">
        <h3 class="text-center">Admin Management</h3>
        <div class="buttons">
            <button class="btn btn-success" data-bs-toggle="modal" id="myBtn" data-bs-target="#exampleModal">
                Add User
            </button>
        </div>
        <div class="user-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user){
                            if($user['role']!='admin'){
                                ?>
                                <tr>
                                    <td><?php echo $user['firstName']. " ". $user['lastName']; ?></td>
                                    <td><?php echo $user['userName']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <?php
                                        if($user['status']==0){
                                            echo "<a href='php/userActions.php?action=activate&userId=$user[userId]'>
                                                    <button class='btn btn-success'>Activate</button>
                                                </a>";
                                        }
                                        else{
                                            echo "<a href='php/userActions.php?action=deactivate&userId=$user[userId]'>
                                                    <button class='btn btn-success'>Deactivate</button>
                                                </a>";
                                        }
                                        ?>
                                        <a href="php/userActions.php?action=delete&userId=<?php echo $user['userId']; ?>">
                                            <button class='btn btn-danger'><i class='bx bx-trash'></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="btn-close close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/addUser.php" method="post">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="" class="form-label">First Name <span class="require-star">*</span></label>
                                    <input type="text" class="form-control" id="" name="fName" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label for="exampleInputPassword1" class="form-label">Last Name <span class="require-star">*</span></label>
                                    <input type="text" id="" name="lName" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="exampleInputPassword1" class="form-label">Phone <span class="require-star">*</span></label>
                                    <input type="text" id="" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label for="" class="form-label">email <span class="require-star">*</span></label>
                                    <input type="email" class="form-control" id="" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="exampleInputPassword1" class="form-label">User Name <span class="require-star">*</span></label>
                                    <input type="text" id="" name="userName" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label for="" class="form-label">Password <span class="require-star">*</span></label>
                                    <input type="password" class="form-control" id="" name="password" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>




    </div>
</main>

</div>

<script src="asset/js/modal.js"></script>
</body>
</html>