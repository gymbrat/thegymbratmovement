<?php

// require MySQL Connection
require ('database/DBController.php');

// require AboutMe Class
require ('database/AboutMe.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

// require User Class
require ('database/User.php');

// require Blogs Class
require ('database/Blogs.php');

// require Codes Class
require ('database/Codes.php');

// require WorkoutGuides Class
require ('database/WorkoutGuides.php');

// require WorkoutGuides Class
require ('database/SocialMediaLinks.php');




// DBController object
$db = new DBController();

// Product object
$aboutme = new AboutMe($db);
$aboutmeData = $aboutme->getAboutMe();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db);

// User object
$user = new User($db);
$users = $user->getUsers();

// Blog object
$blogs = new Blog($db);
$blog = $blogs->getBlogs();
$blogComments = $blogs->getBlogComments();

// Codes object
$codes = new Codes($db);
$code = $codes->getCodes();

// Workout Guides object
$workoutg = new WorkoutGuides($db);
$workoutguides = $workoutg->getWorkoutGuides();

// Social Media Links object
$socialmedia = new SocialMediaLinks($db);
$socialmedialinks = $socialmedia->getSocialMediaLinks();


