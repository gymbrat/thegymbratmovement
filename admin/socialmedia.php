<?php 
ob_start();

// include admin-header.php file
include("admin-header.php");

?>
<!-- Page content -->
<div class="accordion px-3 px-sm-5 my-5" id="accordionExample">
    <?php 

    if(isset($_GET["update"])){
        if($_GET["update"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Social media link was successfully updated!</div>';
        }
        else if($_GET["update"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your social media link was not updated. Please try again.</p>';
        }
    }

    if(isset($_GET["socialmedia"])){
        if($_GET["socialmedia"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Social media icon was successfully deleted.</div>';
        }
    }
    ?>

    <h2>Social Media Links</h2>
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Links
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
                                    <th>Social Media Account</th>
                                    <th>Link</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($socialmedialinks as $socialmedialink){?>
                                    <tr>
                                        <td><?= $socialmedialink['socialmedia'] ?></td>
                                        <td><?= $socialmedialink['link'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModal-<?= $socialmedialink['id'] ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModalDelete-<?= $socialmedialink['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <!-- Modal -->
                                             <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?= $socialmedialink['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Link</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="container text-left">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?= $socialmedialink['id'] ?>" name="social_id">
                                                                    <div class="col-md-12 mb-2">
                                                                        <h5><?= $socialmedialink['socialmedia'] ?></h5>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="social_link_update" class="col-form-label">Link: </label>
                                                                        <input type="text" class="form-control cus_input" id="social_link_update" name="social_link_update" value="" placeholder="<?= $socialmedialink['link'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <input type="submit" value="Update" name="social_update_submit" class="form-control cus_input_btn text-danger">
                                                                    </div>
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
                                            <div class="modal fade" id="myModalDelete-<?= $socialmedialink['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Delete Social Media Icon</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?= $socialmedialink['id'] ?>" name="social_id">
                                                            Are you sure you want to delete this icon?<br>
                                                            <button type="submit" name="delete-social-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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

