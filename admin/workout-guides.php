<?php 
ob_start();

// include admin-header.php file
include("admin-header.php");

?>
<!-- Page content -->
<div class="accordion px-3 px-sm-5 my-5" id="accordionExample">
    <?php 
    if(isset($_GET["upload"])){
        if($_GET["upload"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Workout guide has been successully added</div>';
        }
        else if($_GET["updload"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your workout guide was not added. Please try again.</p>';
        }
    }

    if(isset($_GET["update"])){
        if($_GET["update"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Workout guide was successfully updated!</div>';
        }
        else if($_GET["update"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your workout guide was not updated. Please try again.</p>';
        }
    }

    if(isset($_GET["guide"])){
        if($_GET["guide"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Workout guide was successfully deleted.</div>';
        }
    }
    ?>

    
    <h2>Workout Guides</h2>

    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                New Workout Guide
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form method="post"  enctype="multipart/form-data">
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="new_workout_title">Title</label>
                                    <input type="text" class="form-control cus_input" id="new_workout_title" name="new_workout_title" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="workout_price">Price</label>
                                    <input type="text" class="form-control cus_input" id="workout_price" name="workout_price" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="file_guide">File GUID</label>
                                    <input type="text" class="form-control cus_input" id="file_guide" name="file_guide" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="workout_description">Description</label>
                                    <textarea class="form-control" id="workout_description" name="workout_description" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" name="new_workout_submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            View Workout Guides Page
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <h4 class="border-left pl-3">The Gymbrat Movement - Workout Guides Page</h4>
            <iframe src="../workout-guides.php" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" height="1000px" width="100%" allowfullscreen></iframe>  
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Workout Guides
            </button>
        </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <section class="update-item">
                    <form method="post" >
                        <table id="example" class="display text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-block">ID</th>
                                    <th>Title</th>
                                    <th class="d-none d-sm-block">Description</th>
                                    <th>Price</th>
                                    <th class="d-none d-sm-block">GUID</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($workoutguides as $thisGuide){?>
                                    <tr>
                                        <td class="py-4 d-none d-sm-block"><?= $thisGuide['id'] ?></td>
                                        <td><?= $thisGuide['title'] ?></td>
                                        <td class="d-none d-sm-block"><?= $thisGuide['description'] ?></td>
                                        <td>$<?= $thisGuide['price'] ?></td>
                                        <td class="d-none d-sm-block"><?= $thisGuide['guid'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModal-<?= $thisGuide['id'] ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModalDelete-<?= $thisGuide['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?= $thisGuide['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Workout Guide</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="container text-left">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?= $thisGuide['id'] ?? 0; ?>" name="workout_id">
                                                                    <div class="col-md-12 mb-2">
                                                                        <h5>Workout Guide ID: <?= $thisGuide['id'] ?? 0; ?></h5>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="workout_title" class="col-form-label">Title: </label>
                                                                        <input type="text" class="form-control cus_input" id="workout_title" name="workout_title"  placeholder="<?= $thisGuide['title'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="workout_desc" class="col-form-label">Description: </label>
                                                                        <input type="text" class="form-control cus_input" id="workout_desc" name="workout_desc"  placeholder="<?= $thisGuide['description'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <label for="workout_price" class="col-form-label">Price: </label>
                                                                        <input type="text" class="form-control cus_input" id="workout_price" name="workout_price" placeholder="<?= $thisGuide['price'] ?>">
                                                                    </div>
                                                                     <div class="col-md-12 mb-4">
                                                                        <label for="file_guid" class="col-form-label">File GUID: </label>
                                                                        <input type="text" class="form-control cus_input" id="file_guid" name="file_guid" placeholder="<?= $thisGuide['guid'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <input type="submit" value="Update" name="workout_update_submit" class="form-control cus_input_btn text-danger">
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
                                            <div class="modal fade" id="myModalDelete-<?php echo $thisGuide['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Workout Guide</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?php echo  $thisGuide['id'] ?? 0; ?>" name="workout_id">
                                                            Are you sure you want to delete this guide?
                                                            <br>
                                                            <button type="submit" name="delete-guide-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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

