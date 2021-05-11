<?php 
// include header.php file
include("header.php");
?>

<div class="homepage-wrapper">

    <section id="banner-area">
        <div class="hero-section">
            <div class="item">
                <!-- <h1 class="font-anton font-size-6em"><span class="outline-text">RE</span>INVENT<br><span class="outline-text">YOU</span>RSELF</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10 pl-5 pl-md-0 offset-1 offset-md-2 col-sm-6 col-md-4 col-lg-3">
                            <div class="hero-image">
                                <a href="workout-guides.php" class="text-white"><button type="button" class="btn btn-outline-light hero-button">Get Started</button></a>
                                <img src="./assets/hero-message.svg" alt="Reinvent Yourself" width="100%">

                                <!-- <div class="message-hero-section">
                                    <p>Lorem ipsum dolor sit amet, consetetur <br>sadipscing elitr, sed diam nonumy
                                        eirmod tempor</p>
                                    <button type="button" class="btn btn-outline-light">Get Started</button>
                                </div> -->

                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-xl-5 p-5">
                            <div class="rightside d-none d-md-block">
                                <img src="./assets/logo-bg.svg" alt=""  width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--About Me-->
    <section class="about-me" id="about">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="aboutme-image col-6 col-sm-4 col-md-3 col-lg-2 offset-2 offset-sm-1">
                    <img src="./assets/text-images/about-me.svg" alt="About Me" width="100%">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2 rounded">
                    <div class="row">
                        <div class="col-6 col-sm-8">
                            <div class="owl-carousel">
                                <?php foreach($aboutmeData as $about){?>
                                    <div class="post-slide">
                                        <div class="post-img">
                                            <img src="./assets/<?=  $about['image'] ?>" alt="">
                                            <a href="<?=  $about['imagelink'] ?>" class="over-layer" target="_blank"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                         <div class="col-6 pt-4 pt-sm-0 col-sm-4 my-auto">
                            <?php foreach($aboutmeData as $about){?>
                                <h6 class="color-grey"><?=  $about['heading'] ?></h6>
                                <p class="text-white"><?=  $about['aboutme'] ?></p>
                            <?php }?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--!About Me-->

    <!--Workout Guides Section-->
    <section class="workout-guides">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col col-sm-6 col-md-4 col-lg-3 offset-sm-1">
                    <img src="./assets/text-images/workout-guides.svg" alt="Work Out Guides" width="100%">
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="820.047" viewBox="0 0 1869.218 820.047" id="graph" class="d-none d-md-block">
            <g id="Group_66" data-name="Group 66" transform="translate(-50.691 -2253.646)">
                <path id="Path_8" data-name="Path 8" d="M50,2553.3l144.632-113.59,84.228,44.122L508.152,2351.4l132.581,30.469,227.8-201.549,134.648,16.356,270.438-151.317,112.7,42.225L1831.4,1839.129l19.048-62.272,68.2-42.787" transform="translate(1 520)" fill="none" stroke="#fff" stroke-width="1"/>
                <g id="Group_1" data-name="Group 1" transform="translate(334 238)">
                <path id="Path_9" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="#fff" stroke-width="1"/>
                <g id="Ellipse_1" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="#fff" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
                <g id="Group_2" data-name="Group 2" transform="translate(201 208)">
                <path id="Path_9-2" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="snow" stroke-width="1"/>
                <g id="Ellipse_1-2" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="snow" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
                <g id="Group_12" data-name="Group 12" transform="translate(562 37)">
                <path id="Path_9-3" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="snow" stroke-width="1"/>
                <g id="Ellipse_1-3" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="snow" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
                <g id="Group_13" data-name="Group 13" transform="translate(806 -9)">
                <path id="Path_9-4" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="snow" stroke-width="1"/>
                <g id="Ellipse_1-4" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="snow" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
                <g id="Group_14" data-name="Group 14" transform="translate(1217 -133)">
                <path id="Path_9-5" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="snow" stroke-width="1"/>
                <g id="Ellipse_1-5" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="snow" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
                <g id="Group_11" data-name="Group 11" transform="translate(-28 341)">
                <path id="Path_9-6" data-name="Path 9" d="M278.769,2483.57v-26.791" transform="translate(29 180)" fill="none" stroke="snow" stroke-width="1"/>
                <g id="Ellipse_1-6" data-name="Ellipse 1" transform="translate(303 2632)" fill="#fff" stroke="snow" stroke-width="1">
                    <ellipse cx="5" cy="4.5" rx="5" ry="4.5" stroke="none"/>
                    <ellipse cx="5" cy="4.5" rx="4.5" ry="4" fill="none"/>
                </g>
                </g>
            </g>
        </svg>
        <div class="container-fluid">
            <div class="row justify-content-md-center text-white">
                <div class="col col-md-3 col-lg-2 border-bottom border-end d-none d-md-block">
                    <h6>LOREM DOLOR ET DOL</h6>
                </div>
                <div class="col-md-auto col-md-3 col-lg-2 border-bottom border-end d-none d-md-block">
                    <h6>LOREM DOLOR ET DOL</h6>
                </div>
                <div class="col col-md-3 col-lg-2 border-bottom d-none d-md-block">
                    <h6>LOREM DOLOR ET DOL</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid guide-table-center">
            <div class="row justify-content-md-center text-white">
                <div class="col col-md-3 col-lg-2 text-center border-bottom border-end">
                    <img src="./assets/graphics/weights.svg" alt="dumbells" class="pt-5 pt-sm-0" width="100%" style="height: 100%">
                    <h6 class="d-block d-md-none border-bottom pb-3 pb-sm-0">LOREM DOLOR ET DOL</h6>
                </div>
                <div class="col-md-auto col-md-3 col-lg-2 text-center border-bottom border-end">
                    <img src="./assets/graphics/smoothie.svg" alt="dumbells" class="pt-5 pt-sm-0" width="100%" style="height: 100%">
                    <h6 class="d-block d-md-none border-bottom pb-3 pb-sm-0">LOREM DOLOR ET DOL</h6>
                </div>
                <div class="col col-md-3 col-lg-2 text-center border-bottom">
                    <img src="./assets/graphics/small-graph.svg" alt="dumbells" class="pt-5 pt-sm-0" width="100%" style="height: 100%">
                    <h6 class="d-block d-md-none ">LOREM DOLOR ET DOL</h6>
                </div>
            </div>
        </div>
        <div class="container-fluid d-none d-md-block">
            <div class="row justify-content-md-center text-white">
                <div class="col col-md-3 col-lg-2 border-end">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed.</p>
                </div>
                <div class="col-md-auto col-md-3 col-lg-2 border-end">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed.</p>
                </div>
                <div class="col col-md-3 col-lg-2">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed.</p>
                </div>
            </div>
        </div>
    </section>
    <!--!Workout Guides Section-->


    <!--Button CTAs-->
    <section class="bottom-ctas text-white">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-4 my-auto">
                <h6>Lorem ipsum dolor sit amet</h6>
                <img src="./assets/text-images/merchandise.svg" alt="Merchandise" width="100%" class="left-images">
                <img src="./assets/graphics/buildings-sm.svg" alt="" width="100%" class="d-block d-md-none">
                <a href="merchandise.php" class="text-white float-left"><button type="button" class="btn btn-outline-light">Get Started</button></a>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <img src="./assets/text-images/buildings-graphic.svg" alt="" width="100%" class="d-none d-md-block">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-4 my-auto">
                <h6>Lorem ipsum dolor sit amet</h6>
                <img src="./assets/text-images/codes-sm.svg" alt="Codes & Social Media" width="100%" class="left-images">
                <img src="./assets/graphics/buildings-sm.svg" alt="" width="100%" class="d-block d-md-none">
                <a href="codes.php" class="text-white float-left"><button type="button" class="btn btn-outline-light">Find Out More!</button></a>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6">
                <img src="./assets/graphics/neon-sign.svg" alt="Neon Sign" width="100%" class="d-none d-md-block">
            </div>
        </div>
    </section>
    <!--!Button CTAs-->

    <?php 
    /* include blogs area*/ 
    include('Template/_blogs.php');
    /* include blogs area*/ 
    ?>
</div>

 <?php
// include footer.php
include('footer.php')
 ?>