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
    if(isset($_GET["blog"])){
        if($_GET["blog"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Blog was successfully deleted.</div>';
        }
    }
    if(isset($_GET["comment"])){
        if($_GET["comment"] == "deleted"){
            echo '<div class="alert alert-success py-4 my-5" role="alert">Blog comment was successfully deleted.</div>';
        }
    }
    ?>

    
    <h2>Blogs</h2>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Add New Entry
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
                                        <label for="blog_title">Title</label>
                                        <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Blog Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="blog_summary">Summary</label>
                                        <input type="text" class="form-control" id="blog_summary" name="blog_summary" placeholder="Blog Summary">
                                        <small class="form-text text-muted">Typically the first sentence of your blog.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_blog_image">Blog Banner Image</label>
                                        <input type="file" class="form-control-file" id="new_blog_image" name="new_blog_image" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Content</label>
                                        <textarea id="editor" name="blog_content"></textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" name="new_blog_submit" class="btn btn-primary">Submit</button>
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
            View Blog Page
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <h4 class="border-left pl-3">The Gymbrat Movement - Merchandise Page</h4>
            <iframe src="../blogs.php" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" height="1000px" width="100%" allowfullscreen></iframe>  
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit - Delete Entries
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
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th class="d-none d-sm-block">Date Created</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($blog as $thisBlog){?>
                                    <tr>
                                        <td class="d-none d-sm-block py-5"><?= $thisBlog['blogId'] ?></td>
                                        <td><?= $thisBlog['blogTitle'] ?></td>
                                        <td>
                                        <?php $thisBlog['summary'];
                                            $summary = implode(' ', array_slice(explode(' ', $thisBlog['summary']), 0, 5));
                                            echo $summary.'...';
                                        ?>
                                        </td>
                                        <td>
                                        <?php $thisBlog['content'];
                                            $content = implode(' ', array_slice(explode(' ', $thisBlog['content']), 0, 5));
                                            echo $content.'...';
                                        ?>
                                        </td>
                                        <td><img src="../assets<?= $thisBlog['blogImage'] ?? "../assets/products/1.png";?>" alt="product1" class="img-fluid" width="100px"></td>
                                        <td class="d-none d-sm-block"><?= $thisBlog['createdAt'] ?></td>
                                        <td name="buttons">
                                            <div class="container">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal-<?= $thisBlog['blogId'] ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModalDelete-<?= $thisBlog['blogId'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                            <!-- Modal -->
                                             <!-- Modal -->
                                            <div class="modal fade" id="myModal-<?php echo $thisBlog['blogId'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Blog</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="container text-left">
                                                                <div class="row">
                                                                    <input type="hidden" value="<?php echo $thisBlog['blogId'] ?? 0; ?>" name="blog_id">
                                                                    <div class="col-md-12 mb-2">
                                                                        <h5>Blog ID: <?php echo $thisBlog['blogId'] ?? 0; ?></h5>
                                                                    </div>
                                                                    <div class="col-md-12 mb-2 text-center">
                                                                        <img src="../assets<?= $thisBlog['blogImage'] ?? "../assets/products/1.png";?>" alt="product1" class="img-fluid" width="70%">
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="blog_title_update" class="col-form-label">Title: </label>
                                                                        <input type="text" class="form-control cus_input" id="blog_title_update" name="blog_title_update" value="" placeholder="<?= $thisBlog['blogTitle'] ?>">
                                                                    </div>
                                                                    <div class="col-md-12 mb-2">
                                                                        <label for="blog_summary_update" class="col-form-label">Summary: </label>
                                                                        <textarea class="form-control" id="blog_summary_update" rows="3" name="blog_summary_update" placeholder="<?= $thisBlog['summary'] ?>"></textarea>
                                                                    </div>
                                                                    <div class="col-md-12 mb-4">
                                                                        <div class="form-group">
                                                                            <label for="blog_content_update" class="col-form-label">Blog Content</label>
                                                                            <textarea class="form-control" rows="8" id="blog_content_update" name="blog_content_update" value="" placeholder="<?= strip_tags($thisBlog['content']) ?>"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="blog_image_update" class="col-form-label">Upload Item Image(s): </label>
                                                                        <input type="file" class="form-control-file" id="blog_image_update" name="blog_image_update" multiple>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <input type="submit" value="Update" name="blog_update_submit" class="form-control cus_input_btn text-danger">
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
                                            <div class="modal fade" id="myModalDelete-<?= $thisBlog['blogId'] ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Update Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <input type="hidden" value="<?= $thisBlog['blogId'] ?? 0; ?>" name="blog_id">
                                                            Are you sure you want to delete?
                                                            <button type="submit" name="delete-blog-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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
    <div class="card">
        <div class="card-header" id="headingFour">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Edit - Delete Comments
            </button>
        </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class="card-body">
            <section class="update-item">
                    <br>
                    <form method="post"  enctype="multipart/form-data">
                        <table id="example" class="display text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-block">ID</th>
                                    <th>Blog Title</th>
                                    <th>Username</th>
                                    <th>Comment</th>
                                    <th class="d-none d-sm-block">Comment Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($blogComments as $thisComment){?>
                                    <?php foreach($blog as $thisBlog){?>
                                        <?php if ($thisBlog['blogId'] == $thisComment['blogId']) : ?>
                                            <tr>
                                                <td class="d-none d-sm-block py-5"><?= $thisComment['id'] ?></td>
                                                <td><?php  echo $thisBlog['blogTitle'];?></td>
                                                <td><?= $thisComment['commenter_name'] ?></td>
                                                <td><?= $thisComment['comment'] ?></td>
                                                <td class="d-none d-sm-block"><?= $thisComment['comment_date'] ?></td>
                                                <td name="buttons">
                                                    <div class="container">
                                                        <!-- Trigger the modal with a button -->
                                                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModalDelete-<?= $thisComment['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModalDelete-<?= $thisComment['id'] ?>" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Delete Comment</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post">
                                                                    <input type="hidden" value="<?= $thisComment['id'] ?? 0; ?>" name="comment_id">
                                                                    Are you sure you want to delete this comment?
                                                                    <br>
                                                                    <button type="submit" name="blog_comment_delete" class="btn font-baloo text-danger px-3 border-right">Delete</button>
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
                                        <?php endif;?>
                                    <?php }?>
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

