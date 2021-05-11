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
            echo '<div class="alert alert-success py-4 my-5" role="alert">Update Successful!</div>';
        }
        else if($_GET["update"] == "fail"){
            echo '<p class="alert alert-danger py-4 my-5" role="alert">Oops, looks like something is wrong. Please try again.</p>';
        }
    }

    if(isset($_GET["aboutme"])){
        if($_GET["aboutme"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">The image was successfully deleted.</div>';
        }
    }
    ?>

    
    <h2>About Me</h2>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Add New Image
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <form method="post"  enctype="multipart/form-data">
                        <div class="container mt-4 mb-4">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12 col-lg-10">
                                    <div class="form-group">
                                        <label for="image_link">Image Link</label>
                                        <input type="text" class="form-control" id="image_link" name="image_link" placeholder="Image Link">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_aboutme_image">About Me Carousel Image</label>
                                        <input type="file" class="form-control-file" id="new_aboutme_image" name="new_aboutme_image" multiple>
                                    </div>
                                    <hr>
                                    <button type="submit" name="new_aboutme_submit" class="btn btn-primary">Submit</button>
                                </div>
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
            View About Me 
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <h4 class="border-left pl-3">The Gymbrat Movement - About Me</h4>
            <iframe src="../index.php#about" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" height="1000px" width="100%" allowfullscreen></iframe>  
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Content
            </button>
        </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <section class="update-item">
                    <br>
                    <form method="post"  enctype="multipart/form-data">
                        <table id="example" class="display text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-block">ID</th>
                                    <th>Heading</th>
                                    <th>Content</th>
                                    <th>Images</th>
                                    <th class="d-none d-sm-block">Links</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($aboutmeData as $about){?>
                                    <tr>
                                        <td class="d-none d-sm-block py-5"><?= $about['id'] ?></td>
                                        <td><?= $about['heading'] ?></td>
                                        <td>
                                        <?php $about['aboutme'];
                                            $aboutme = implode(' ', array_slice(explode(' ', $about['aboutme']), 0, 5));
                                            echo $aboutme.'...';
                                        ?>
                                        </td>
                                        <td><?php if(!isset($about['image'])){?><p>No Images Go Here</p><?php }else{ ?><img src="../assets<?= $about['image'] ?>" alt="About me images" class="img-fluid" width="100px"><?php }?></td>
                                        <td class="d-none d-sm-block"><?= $about['imagelink'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModal-<?= $about['id'] ?>"><i class="fas fa-edit"></i></button>
                                                <?php if($about['id'] !== '1'){?>
                                                    <button type="button" class="btn btn-info btn-md my-1 my-sm-0" data-toggle="modal" data-target="#myModalDelete-<?= $about['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <?php }?>
                                            </div>
                                            <!-- Modal -->
                                             <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?= $about['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update About Me</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="container text-left">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?= $about['id'] ?>" name="aboutme_id">
                                                                    <div class="col-md-12 mb-2">
                                                                        <h5>About Me Section ID: <?= $about['id'] ?></h5>
                                                                    </div>
                                                                    <?php if($about['image'] != ''){?>
                                                                        <div class="col-md-12 mb-2 text-center">
                                                                            <img src="../assets<?= $about['image'] ?>" alt="About me images" class="img-fluid" width="50%">
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($about['heading'] != ''){?>
                                                                        <div class="col-md-12 mb-2">
                                                                            <label for="aboutme_heading_update" class="col-form-label">Heading: </label>
                                                                            <input type="text" class="form-control cus_input" id="aboutme_heading_update" name="aboutme_heading_update" value="" placeholder="<?= $about['heading'] ?>">
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($about['aboutme'] != ''){?>
                                                                        <div class="col-md-12 mb-2">
                                                                            <label for="aboutme_update" class="col-form-label">About Me: </label>
                                                                            <textarea class="form-control" id="aboutme_update" rows="3" name="aboutme_update" placeholder="<?= $about['aboutme'] ?>"></textarea>
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($about['id'] != '1'){?>
                                                                        <div class="col-md-12 mb-2">
                                                                            <label for="image_link_update">Image Link</label>
                                                                            <input type="text" class="form-control" id="image_link_update" name="image_link_update" placeholder="<?= $about['imagelink'] ?>">
                                                                        </div>
                                                                    <?php }?>
                                                                    <?php if($about['id'] != '1'){?>     
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="aboutme_image_update" class="col-form-label">Upload About Me Image: </label>
                                                                            <input type="file" class="form-control-file" id="aboutme_image_update" name="aboutme_image_update" multiple>
                                                                        </div>
                                                                    <?php }?>
                                                                    <div class="col-md-12 mb-3">
                                                                        <input type="submit" value="Update" name="aboutme_update_submit" class="form-control cus_input_btn text-danger">
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
                                            <div class="modal fade" id="myModalDelete-<?= $about['id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Delete About Me Image</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?= $about['id'] ?>" name="aboutme_id">
                                                            Are you sure you want to delete image?
                                                            <button type="submit" name="delete-aboutme-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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

<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>
<script>    
    tinymce.init({
            selector:'#editor,#blog_content_update',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 500,           
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
                    editor.getContainer().style.borderColor="#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow="",
                    editor.getContainer().style.borderColor=""
                });
            }
        });
</script>
<?php 
// include admin-footer.php file
include("admin-footer.php");
?>

