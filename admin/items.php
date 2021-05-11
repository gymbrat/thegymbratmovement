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
            echo '<div class="alert alert-success py-4 my-5" role="alert">Upload Successful!</div>';
        }
        else if($_GET["upload"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Make sure to fill out all necessary fields.</p>';
        }
    }
    if(isset($_GET["update"])){
        if($_GET["update"] == "success"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Item was successfully updated!</div>';
        }
        else if($_GET["update"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something went wrong. Your item was not updated. Please try again.</p>';
        }
    }
    ?>
    <h2>Merchandise</h2>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                New Item
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <form method="post"  enctype="multipart/form-data">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_item_brand">Brand</label>
                                    <input type="text" class="form-control cus_input" id="new_item_brand" name="new_item_brand" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_item_name">Name</label>
                                    <input type="text" class="form-control cus_input" id="new_item_name" name="new_item_name" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_item_price">Price</label>
                                    <input type="text" class="form-control cus_input" id="new_item_price" name="new_item_price" value="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_item_image">Image</label>
                                    <input type="file" class="form-control-file" id="new_item_image" name="new_item_image" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="item_description">Description</label>
                                    <textarea class="form-control" id="item_description" name="item_description" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="new_item_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            View Merchandise Page
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <h4 class="border-left pl-3">The Gymbrat Movement - Merchandise Page</h4>
            <iframe src="../merchandise.php" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" height="1000px" width="100%" allowfullscreen></iframe>  
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Items
            </button>
        </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <section class="update-item">
                <form method="post"  enctype="multipart/form-data">
                    <table id="example" class="display text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-block">ID</th>
                                <th>Brand</th>
                                <th>Name</th>
                                <th class="d-none d-sm-block">Price</th>
                                <th>Image</th>
                                <th class="d-none d-sm-block">Description</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product_shuffle as $item){?>
                                <tr>
                                    <td class="d-none d-sm-block py-5"><?= $item['item_id'] ?></td>
                                    <td><?= $item['item_brand'] ?></td>
                                    <td><?= $item['item_name'] ?></td>
                                    <td class="d-none d-sm-block">$<?= $item['item_price'] ?></td>
                                    <td><img src="../assets<?= $item['item_image'] ?? "../assets/products/1.png";?>" alt="product1" class="img-fluid" width="100px"></td>
                                    <td class="d-none d-sm-block">
                                    <?php 
                                        $description = implode(' ', array_slice(explode(' ', $item['item_description']), 0, 5));
                                        echo $description.'...';
                                    ?>
                                    </td>
                                    <td name="buttons">
                                        <div class="container">
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModal-<?php echo $item['item_id'] ?>"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModalDelete-<?php echo $item['item_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal-<?php echo $item['item_id'] ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title">Update Item</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="container text-left">
                                                            <div class="row">
                                                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                                                <div class="col-md-12 mb-2">
                                                                    <h5>Item ID: <?php echo $item['item_id'] ?? 0; ?></h5>
                                                                </div>
                                                                <div class="col-md-12 mb-2 text-center">
                                                                    <img src="../assets<?= $item['item_image'] ?? "../assets/products/1.png";?>" alt="product1" class="img-fluid" width="70%">
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="brand_update" class="col-form-label">Item Brand: </label>
                                                                    <input type="text" class="form-control cus_input" id="brand_update" name="brand_update" value="" placeholder="<?= $item['item_brand'] ?>">
                                                                </div>
                                                                <div class="col-md-12 mb-2">
                                                                    <label for="name_update" class="col-form-label">Item Name: </label>
                                                                    <input type="text" class="form-control cus_input" id="name_update" name="name_update" value="" placeholder="<?= $item['item_name'] ?>">
                                                                </div>
                                                                <div class="col-md-12 mb-4">
                                                                    <label for="price_update" class="col-form-label">Item Price: </label>
                                                                    <input type="text" class="form-control cus_input" id="price_update" name="price_update" value="" placeholder="<?= $item['item_price'] ?>">
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="description_update">Description:</label>
                                                                    <textarea class="form-control" id="description_update" rows="8" name="description_update" placeholder="<?= $item['item_description'] ?>"></textarea>
                                                                </div>
                                                                <div class="col-md-12 mb-5">
                                                                    <label for="image_update" class="col-form-label">Replace Image: </label>
                                                                    <input type="file" class="form-control-file" name="image_update" id="image_update" multiple>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <input type="submit" value="Update" name="item_update_submit" class="form-control cus_input_btn text-danger">
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
                                        <div class="modal fade" id="myModalDelete-<?php echo $item['item_id'] ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title">Update Item</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                                        Are you sure you want to delete?
                                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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



