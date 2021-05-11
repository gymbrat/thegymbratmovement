<?php 
ob_start();
// include header.php file
include("header.php");
?>

<div class="parallax"></div>

<div class="container workout-plans codes pt-5 my-5" style="min-height:60vh;">
    <h3>Workout Guides</h3>
    <div class="row my-5" style="width: auto;">
        <!-- Table -->
        <?php foreach($workoutguides as $guides){?>
            <div class="container my-3 col col-sm-12 col-lg-4">
                <div class="plan-wrap card px-5">
                    <div class="row text-center" style="width: auto;">
                        <div class="col-12">
                            <h3><strong><?=  $guides['title'] ?></strong></h3>
                            <hr>
                        </div>
                        <div class="col-12">
                            <p><?=  $guides['description'] ?></p>
                            <p><b>$<?=  $guides['price'] ?></b></p>
                        </div>
                        <div class="col">
                            <button style="width:100%;" class="snipcart-add-item btn btn-gradient font-size-16"
                                    data-item-id="<?=  $guides['id'] ?>"
                                    data-item-price="<?=  $guides['price'] ?>"
                                    data-item-url="http://localhost/tutorial/Mobile_shopee/workout-guides.php"
                                    data-item-description="<?=  $guides['description'] ?>"
                                    data-item-name="<?=  $guides['title'] ?>"
                                    data-item-shippable="false"
                                    data-item-file-guide="ec8d3719-6461-42e4-bea5-f21f1682b1d5">
                                    Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>

<?php 
include('footer.php')
 ?>
