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
            echo '<div class="alert alert-success py-4 my-5" role="alert">Code has been successully added</div>';
        }
        else if($_GET["updload"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your code was not added. Please try again.</p>';
        }
    }

    if(isset($_GET["update"])){
        if($_GET["update"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Code was successfully updated!</div>';
        }
        else if($_GET["update"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your code was not updated. Please try again.</p>';
        }
    }

    if(isset($_GET["code"])){
        if($_GET["code"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Code was successfully deleted.</div>';
        }
    }
    ?>

    
    <h2>Codes & Social Media</h2>

    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                New Code
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
                                    <label for="new_code_brand">Brand</label>
                                    <input type="text" class="form-control cus_input" id="new_code_brand" name="new_code_brand" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="new_code_link">HTTP Link</label>
                                    <input type="text" class="form-control cus_input" id="new_code_link" name="new_code_link" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="new_code">Code</label>
                                    <input type="text" class="form-control cus_input" id="new_code" name="new_code" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" name="new_code_submit" class="btn btn-primary">Submit</button>
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
            View Codes & Social Media Page
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <h4 class="border-left pl-3">The Gymbrat Movement - Codes & Social Media Page</h4>
            <iframe src="../codes.php" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" height="1000px" width="100%" allowfullscreen></iframe>  
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Codes
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
                                    <th>Brand</th>
                                    <th class="d-none d-sm-block">Brand Link</th>
                                    <th>Code</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($code as $thisCode){?>
                                    <tr>
                                        <td class="py-4 d-none d-sm-block"><?= $thisCode['id'] ?></td>
                                        <td><?= $thisCode['brand'] ?></td>
                                        <td class="d-none d-sm-block"><?= $thisCode['link'] ?></td>
                                        <td><?= $thisCode['code'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModal-<?= $thisCode['id'] ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModalDelete-<?= $thisCode['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?= $thisCode['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="container text-left">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?= $thisCode['id'] ?? 0; ?>" name="code_id">
                                                                    <div class="col-md-12 mb-2">
                                                                        <h5>Item ID: <?= $thisCode['id'] ?? 0; ?></h5>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="code_brand" class="col-form-label">Brand Name: </label>
                                                                        <input type="text" class="form-control cus_input" id="code_brand" name="code_brand"  placeholder="<?= $thisCode['brand'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="link_update" class="col-form-label">Brand Link: </label>
                                                                        <input type="text" class="form-control cus_input" id="link_update" name="link_update"  placeholder="<?= $thisCode['link'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <label for="code_update" class="col-form-label">Code: </label>
                                                                        <input type="text" class="form-control cus_input" id="code_update" name="code_update"  placeholder="<?= $thisCode['code'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <input type="submit" value="Update" name="code_update_submit" class="form-control cus_input_btn text-danger">
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
                                            <div class="modal fade" id="myModalDelete-<?php echo $thisCode['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?php echo  $thisCode['id'] ?? 0; ?>" name="code_id">
                                                            Are you sure you want to delete this code?
                                                            <br>
                                                            <button type="submit" name="delete-code-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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

