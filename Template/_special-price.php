<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

/*request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));
*/
?>
<section id="special-price">
    <div class="container">
        <h3 class="font-rubik pt-5">Merchandise</h3>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="container">
            <div class="row grid py-4">
                <?php array_map(function ($item) use($in_cart){ ?>
                    <div class="grid-item col-6 col-xs-6 col-sm-4 col-md-3  <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                        <div class="item py-5 border my-3" >
                            <div class="product font-rale">
                                <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="./assets<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid" width="100%"></a>
                                <div class="text-center merch">
                                    <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                    <!-- <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div> -->
                                    <div class="price pb-2">
                                        <span><b>$<?php echo $item['item_price'] ?? 0 ?></b></span>
                                    </div>
                                    <button class="snipcart-add-item btn btn-gradient font-size-16"
                                    data-item-id="<?php echo $item['item_id'] ?? '1'; ?>"
                                    data-item-price="<?php echo $item['item_price'] ?? 0 ?>"
                                    data-item-url="<?= $_SERVER['PHP_SELF'] ?>"
                                    data-item-description="<?php echo $item['item_brand'] ?? "Brand" ; ?>"
                                    data-item-image="./assets<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>"
                                    data-item-name="<?php echo $item['item_name'] ?? "Unknown"; ?>">
                                    Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }, $product_shuffle) ?>
            </div>
        </div>
    </div>
</section>
<!-- !Special Price -->


