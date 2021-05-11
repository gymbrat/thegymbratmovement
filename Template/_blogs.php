<!--Blogs-->
<section id="blogs">
    <div class="container py-4 px-5 px-md-0">
        <h4 class="font-poppins font-size-20 text-white px-5 px-md-0">Latest Blogs</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach($blog as $blogpost){?>
                <div class="item">
                    <div class="card border-0 font-poppins mx-5 mx-sm-5" style="width:18rem;">
                        <h5 class="card-title font-size-16 px-3 py-2"><?=  $blogpost['blogTitle'] ?></h5>
                        <a href="<?php printf('%s?blog_id=%s', 'bloglink.php',  $blogpost['blogId']); ?>"><img src="assets/<?=  $blogpost['blogImage'] ?>" class="img-fluid rounded" width="100%"></a>
                        <p class="card-text font-size-14 text-black-50 py-1 px-3"><?=  substr($blogpost['summary'], 0, 50); ?>...</p>
                        <a href="#" class="color-second text-left px-3 text-white">Read more....</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<!--!Blogs-->