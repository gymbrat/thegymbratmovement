<!--   product  -->
<?php

    $item_id = $_GET['item_id'] ?? 1;

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['product_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
    $in_cart = $Cart->getCartId($product->getData('cart'));

    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row px-3">
            <div class="col-sm-6">
                <img src="./assets<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <!--<div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                </div>-->
                <!---    product price       -->
                <table class="my-3">
                    <!--<tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$162.00</strike></td>
                    </tr>-->
                    <tr class="font-rale font-size-14">
                        <td>Price:</td>
                        <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span></td>
                    </tr>
                    <!--
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">$152.00</span></td>
                    </tr>-->
                </table>
                <!---    !product price       -->

                <!--    #policy 
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div> !policy -->
                <hr>
                <button style="width:100%;" class="snipcart-add-item btn btn-gradient font-size-16"
                data-item-id="<?php echo $item['item_id'] ?? '1'; ?>"
                data-item-price="<?php echo $item['item_price'] ?? 0 ?>"
                data-item-url="<?= $_SERVER['PHP_SELF'] ?>"
                data-item-description="<?php echo $item['item_brand'] ?? "Brand" ; ?>"
                data-item-image="./assets<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>"
                data-item-name="<?php echo $item['item_name'] ?? "Unknown"; ?>">
                Add to cart
                </button>

                <!-- order-details 
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by : Mar 29  - Apr 1</small>
                    <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                </div>
                !order-details -->

                <!-- color 
                <div class="row">
                    <div class="col-6">
                    
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-poppins">Color:</h6>
                                <div class="p-2 bg-warning rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 bg-info rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 bg-success rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                         product qty section 
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                !product qty section -->

                <!-- size 
                <div class="size my-3">
                    <h6 class="font-baloo">Size :</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div> !size -->


            </div>

            <div class="col-12 mt-1 mt-lg-5">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14"><?php echo $item['item_description'] ?? "Unknown"; ?></p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?>