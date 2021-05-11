<?php
ob_start();
// include header.php file
include ('header.php');
?>

<section class="blog-box  border rounded">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-4 mb-2">
                <?php $comments = array(); foreach($blog as $blogpost){?>
                    <div class="col blog-sections card py-3">
                        <div class="blog-title p-3 ml-0 rounded">
                            <h2><a href="<?php printf('%s?blog_id=%s', 'bloglink.php',  $blogpost['blogId']); ?>"><?=  $blogpost['blogTitle'] ?></a></h2>
                        </div>
                        <a href="<?php printf('%s?blog_id=%s', 'bloglink.php',  $blogpost['blogId']); ?>"><img src="assets/<?=  $blogpost['blogImage'] ?>" class="img-fluid rounded" width="100%"></a>
                            <div class="py-3">
                            <p class="mb-0 grey font-size-12 grey"><i class="fas fa-user"></i> Lexi Simoes<i class="fa fa-calendar ml-3" aria-hidden="true"></i> <?= date('m-d-Y', strtotime($blogpost['createdAt'])); ?></p>
                        </div>
                        <p><?=  substr($blogpost['summary'], 0, 150); ?>...</p>
                        <a href="<?php printf('%s?blog_id=%s', 'bloglink.php',  $blogpost['blogId']); ?>" class="readmore btn-gradient p-0">READ MORE...</a>
                    </div>
                <?php }?>
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
// include footer.php
include('footer.php')
 ?>