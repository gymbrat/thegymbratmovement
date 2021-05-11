</main>
    <!--!start #main-site-->

    <!--start #footer-->
    <footer id="footer" class="bg-black text-white">
        <div class="container content-wrap">
            <div class="row justify-content-md-center pb-5">
                <div class="col-sm-4 col-md-3 col-6">
                    <h4 class="font-poppins font-size-16 mb-4">Mobile Shopee</h4>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                </div>
                <div class="col-sm-4 col-md-3 col-6">
                    <h4 class="font-poppins font-size-16 mb-4">Newsletter</h4>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                </div>
                <div class="col-sm-4 col-md-3 col-6 d-none d-md-block">
                    <h4 class="font-poppins font-size-16 mb-4">Information</h4>
                    <div class="d-flex flex-column flex-wrap">
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    <p class="font-size-14 font-poppins text-white-50"><a href="">External Link</a></p>
                    </div>
                </div>
                <div class="col-sm-4  col-md-3 col-12">
                    <h4 class="font-poppins font-size-16 mb-4">Social Media</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <div class="row justify-content-sm-center">
                            <?php foreach($socialmedialinks as $socialmedialink){?>
                                <?php if($socialmedialink['link'] !== ''){?>
                                    <div class="col-2 col-sm-4"><a href="<?= $socialmedialink['link'] ?>"><img src="<?= $socialmedialink['imagepath'] ?>" alt="<?= $socialmedialink['socialmedia'] ?>" target="_blank"></a></div>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright container-fluid text-center text-white py-2">
            <div class="row copyright-inner justify-content-md-center border-top py-3">
                <div class="col-4 col-md-1 border-end">External Link</div>
                <div class="col-4 col-md-1 border-end">External Link</div>
                <div class="col-4 col-md-1">External Link</div>
            </div>
            <p class="copyright-inner2 font-poppins font-size-14">&copy; 2021 Responsive Website by <a href="#">Jaime Maldonado Development</a></p>
        </div>
    </footer>
    <!--start #footer-->

<!-- jQuey -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!-- Isotope plugin cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

<!-- GSap -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>  

<!-- Snipcart -->
<script async src="https://cdn.snipcart.com/themes/v3.1.1/default/snipcart.js"></script>
<div hidden id="snipcart" data-api-key="M2JkM2QwMGEtNzExYy00MmU0LTk0OTUtOGYxYTAyZTAwMDYyNjM3NTU2MDMxMTUwMTQ5MTAy"></div>

<!-- Custom Javascript -->
<script src="index.js"></script>
</body>

</html>