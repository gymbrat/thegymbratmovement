<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gymbrat Movement</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <!--Snipcart-->
    <link rel="stylesheet" href="https://cdn.snipcart.com/themes/v3.1.1/default/snipcart.css" />

    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>

<body>
<div class="side-menu <?php if(!strpos($_SERVER['REQUEST_URI'], 'index')){?>d-none d-sm-block<?php }?>"> 
    <div class="text-center">
        <a href="javascript:void(0)"><img src="./assets/graphics/side-menu-bars.svg" alt="Menu Bars" class="pt-5"></a>
    </div>
    <a href="#" id="side-text" class="text-white font-size-20">Workout Guides</a>
    <ul id="side-list">
        <?php foreach($workoutguides as $guides){?> 
            <li><a href="workout-guides.php" class="text-white font-size-20 workout-plans" style="opacity:0"><?=  $guides['title'] ?></a></li>
        <?php }?>
        <li><a href="contact.php" class="text-white font-size-20 workout-plans" style="opacity:0">Contact</a></li>
    </ul>
    
</div>

    
    <!--start #header-->
    <header id="header">
        
        <nav class="navbar navbar-expand-lg navbar-dark color-primary-bg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./assets/logo.svg"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav  font-poppins">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="workout-guides.php">Workout Guides</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="merchandise.php">Merchandise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="codes.php">Codes & Social Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blogs.php">Blogs</a>
                        </li>
                        <li class="nav-item border-end">
                            <div class="snipcart-summary">
                                <a class="nav-link text-white snipcart-checkout" href="#">
                                    <span class="snipcart-items-count font-size-12 px-2" style="margin-right: -3.9em;vertical-align: 0.24em;">
                                    </span>
                                    <img src="./assets/graphics/shopping-cart.svg" alt="Shopping cart" style="width:3.5em; padding: 0 .8rem;">
                                </a>
                            </div>
                        </li>
                        <li class="nav-item" style="padding-top:.4em;">
                            <?php
                            if(isset($_SESSION['userName'])){
                                echo '<a href="includes/logout.inc.php" class="py-3 px-4 mx-lg-4 border text-light nav-link d-none d-sm-none d-md-none d-lg-block">Logout</a>';
                                echo '<a href="includes/logout.inc.php" class="nav-link d-block d-lg-none">Logout</a>';
                            }
                            else{
                                echo '<a href="login.php" class="py-3 px-4 mx-lg-4 border text-light nav-link d-none d-sm-none d-md-none d-lg-block">Login</a>';
                                echo '<a href="login.php" class="nav-link d-block d-lg-none">Login</a>';
                              
                            }
                            ?>
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
        <!--!Primary Navigation-->

    </header>
    <!--!start #header-->

    <!--start #main-site-->
    <main id="main-site" style="min-height: 62vh;">
