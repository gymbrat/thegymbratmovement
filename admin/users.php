<?php 
ob_start();

// include admin-header.php file
include("admin-header.php");

?>
<!-- Page content -->
<div class="accordion px-3 px-sm-5 my-5" id="accordionExample">
    <?php 
    if(isset($_GET["userdelete"])){
        if($_GET["userdelete"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">User has been successully deleted</div>';
        }
    }
    ?>
    <h2>Users</h2>
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Items
            </button>
        </h2>
        </div>
        <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <section class="update-item">
                    <form method="post"  enctype="multipart/form-data">
                        <table id="example" class="display text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-block">User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th class="d-none d-sm-block">Password</th>
                                    <th>Registered</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $thisUser){?>
                                    <tr>
                                        <td class="d-none d-sm-block py-4"><?= $thisUser['usersId'] ?></td>
                                        <td><?= $thisUser['firstName'] ?></td>
                                        <td><?= $thisUser['lastName'] ?></td>
                                        <td><?= $thisUser['userName'] ?></td>
                                        <td><?= $thisUser['userEmail'] ?></td>
                                        <td><?= $thisUser['userPassword'] ?></td>
                                        <td class="d-none d-sm-block"><?= $thisUser['registered'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModalDelete-<?= $thisUser['usersId'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?= $thisUser['usersId'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?= $thisUser['usersId'] ?? 0; ?>" name="item_id">
                                                                    <div class="col-md-12 my-2">
                                                                        <h5>Item ID: <?= $thisUser['usersId'] ?? 0; ?></h5>
                                                                    </div>
                                                                    <label for="newName" class="col-md-3 col-form-label my-2">Item Brand: </label>
                                                                    <div class="col-md-9 my-2">
                                                                        <input type="text" class="form-control cus_input" id="" name="brand" value="" placeholder="<?= $item['item_brand'] ?>">
                                                                    </div>
                                                                    <label for="" class="col-md-3 col-form-label my-2">Item Name: </label>
                                                                    <div class="col-md-9 my-2">
                                                                        <input type="text" class="form-control cus_input" id="" name="name" value="" placeholder="<?= $item['item_name'] ?>">
                                                                    </div>
                                                                    <label for="" class="col-md-3 col-form-label my-2">Item Price: </label>
                                                                    <div class="col-md-9 my-2">
                                                                        <input type="text" class="form-control cus_input" id="" name="price" value="" placeholder="<?= $item['item_price'] ?>">
                                                                    </div>
                                                                    <label for="" class="col-md-5 col-form-label my-2 my-2">Upload Item Image(s): </label>
                                                                    <div class="col-md-7 my-2">
                                                                    <input type="file" class="form-control-file" name="item-image" id="" multiple>
                                                                    </div>
                                                                    <hr>
                                                                    <input type="submit" value="Update" name="item_submit" class="form-control cus_input_btn text-danger">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModalDelete-<?= $thisUser['usersId'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Delete User</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?= $thisUser['usersId'] ?? 0; ?>" name="user_id">
                                                            <p>Are you sure you want to delete this user?</p>
                                                            <button type="submit" name="delete-user-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                                            <button type="submit" name="cancel" class="btn font-baloo text-danger px-3 border-right">Cancel</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </form>
            </section>
        </div>
        </div>
    </div>
</div>


<?php 
// include admin-footer.php file
include("admin-footer.php");
?>

