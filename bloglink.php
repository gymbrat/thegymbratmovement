<?php
ob_start();
// include header.php file
include ('header.php');

$blog_id = $_GET['blog_id'] ?? 1;

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['blog_comment_submit'])){
        // call method addToBlog
        $blogs->addToBlog($_POST['blog_id'], $_POST['commenter_name'],$_POST['comment']);
    }
     // Delete Blog Comment
    if (isset($_POST['blog_comment_delete'])){
        $blogs->deleteBlogComment($_POST['comment_id'], $_POST['blog_id'],'blogcomments');
    }
}




foreach ($blogs->getBlogs() as $blogs) :
    if ($blogs['blogId'] == $blog_id) :?>
    <?php
        $comments = array();
        foreach ($blogComments as $blogcomment){
            if($blogs['blogId'] == $blogcomment['blogId']){
                $comments[] = $blogcomment['comment'];
                $commentcount = count($comments);
            }
        }?>
    

    <section class="blog-box">
        <div class="container-fluid border rounded">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-4">
                    <div class="blog-title p-3">
                        <h2><?php echo $blogs['blogTitle'] ?? "Unknown"; ?></h2>
                    </div>
                    <img src="<img src='assets/<?=  $blogpost['blogImage'] ?>" class="img-fluid rounded" >
                    <div class="pt-3">
                        <p class="mb-0 grey font-size-12 grey"><i class="fas fa-user"></i> Lexi Simoes<i class="fa fa-calendar ml-3" aria-hidden="true"></i> <?= date('m-d-Y', strtotime($blogs['createdAt'])); ?><i class="fas fa-comments ml-3"></i> <?= $commentcount?></p>
                    </div>  
                    
                    <div class="blog-content mt-4">
                        <p class="font-size-16"><?php echo $blogs['content'] ?? "Unknown"; ?></p>
                        <div class="container">
                            <?php
                                if(isset($_SESSION['userName'])){?>
                                   <div class="row">
                                        <div class="col-12">
                                            <div class="comments">
                                                <div class="comment-box add-comment">
                                                    <!-- <span class="commenter-pic">
                                                        <?php echo $_SESSION['userName'];?>
                                                    </span> -->
                                                    <form method="post">
                                                        <span class="commenter-name">
                                                            <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
                                                            <input type="hidden" name="commenter_name" value="<?=  $_SESSION['userName'];?>">
                                                            <input type="text" placeholder="Add a public comment" name="comment">
                                                            <button type="submit" class="btn btn-gradient font-size-16" name="blog_comment_submit">Comment</button>
                                                            <button type="cancel" class="btn btn-gradient font-size-16">Cancel</button>
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                            <?php }else{
                                    echo '<div class="py-3 px-4 mx-lg-4 mb-5 border"><a href="login.php">Sign in or register to comment!</a></div>';
                                  }?> 
                        </div>
                        <div class="comment-box" id="comment-box">
                            <?php 
                            foreach ($blogComments as $blogComment){
                                if($blogs['blogId'] == $blogComment['blogId']){
                                    echo '<form method="post">';
                                    echo '<div class="comment-inline"><h6><b>'.$blogComment['commenter_name'].'</b></h6>&nbsp;<small class="grey">'.date('m-d-Y', strtotime($blogComment['comment_date'])).'</small></div>';
                                    echo '<p>'.$blogComment['comment'];
                                    if($_SESSION['userName'] !== $blogComment['commenter_name']){
                                        echo '</p>';
                                    }else{
                                        echo '<input type="hidden" value="'.$blogComment['id'].'" name="comment_id">';
                                        echo '<input type="hidden" value="'.$blogs['blogId'].'" name="blog_id">';
                                        echo '<button type="submit" class="btn btn-default text-danger" name="blog_comment_delete"><small>Delete</small></button></p>';
                                    }
                                    echo '</form>';
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 side-blog p-4">
                    <h4 style="padding-top:10px;color:#8a8a8a;"><strong>Index</strong></h4>
                    <hr>
                     <ul>
                     <?php foreach($blog as $blogpost){?>
                        <li><strong><a href="<?php printf('%s?blog_id=%s', 'bloglink.php',  $blogpost['blogId']); ?>"><?=  $blogpost['blogTitle'] ?></a></strong></li>
                    <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
endforeach;

?>
<script>
// Reply box popup JS
$(document).ready(function(){
  $(".reply-popup").click(function(){
    $(".reply-box").toggle();
  });
});
</script>

 <?php
// include footer.php
include('footer.php')
 ?>