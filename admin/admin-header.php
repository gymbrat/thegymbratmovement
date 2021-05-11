
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gymbrat Movement - Admin</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom CSS file -->
    <link rel="stylesheet" type="text/css" href="admin-style.css">

    <?php
    // require functions.php file
    require ('../functions.php');
    $product_shuffle;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // ========================================== ABOUT ME ==========================================
        // Add Aboutme Image 
        if (isset($_POST['new_aboutme_submit'])){
            $aboutme->addAboutMeImage($_POST['image_link'],$_FILES['new_aboutme_image']);
        }
        // Update Aboutme
        if (isset($_POST['aboutme_update_submit'])){
            $aboutme->updateAboutMe($_POST['aboutme_id'],$_POST['aboutme_heading_update'],$_POST['aboutme_update'],$_POST['image_link_update'],$_FILES['aboutme_image_update']);
        }
        // Delete Aboutme
        if (isset($_POST['delete-aboutme-submit'])){
            $aboutme->deleteAboutMeImage($_POST['aboutme_id'], 'aboutme');
        }
        // ========================================== ABOUT ME END ==========================================

        // ========================================== ITEMS ==========================================
        // Add Item 
        if (isset($_POST['new_item_submit'])){
            $Cart->addItem($_POST['new_item_brand'],$_POST['new_item_name'],$_POST['new_item_price'],$_POST['item_description'],$_FILES['new_item_image']);
        }
        // Update Item
        if (isset($_POST['item_update_submit'])){
            $Cart->updateItem($_POST['item_id'],$_POST['brand_update'],$_POST['name_update'],$_POST['price_update'],$_POST['description_update'],$_FILES['image_update']);
        }
        // Delete Item
        if (isset($_POST['delete-cart-submit'])){
            $Cart->deleteCart($_POST['item_id'], 'product');
        }
        // ========================================== ITEMS END ==========================================

        // ========================================== BLOGS ==========================================
        // New Blog
        if (isset($_POST['new_blog_submit'])){
            $blogs->addBlog($_POST['blog_title'],$_POST['blog_summary'],$_FILES['new_blog_image'],$_POST['blog_content']);
        }
        // Update Blog
        if (isset($_POST['blog_update_submit'])){
            $blogs->updateBlog($_POST['blog_id'],$_POST['blog_title_update'],$_POST['blog_summary_update'],$_FILES['blog_image_update'],$_POST['blog_content_update']);
        }
        // Delete Blog
        if (isset($_POST['delete-blog-submit'])){
            $blogs->deleteBlog($_POST['blog_id'], 'blogs');
        }
        // Delete Blog Comment
        if (isset($_POST['blog_comment_delete'])){
            $blogs->deleteBlogComment($_POST['comment_id'], 'blogcomments');
        }

        //========================================== BLOGS END ==========================================

        // ========================================== WORKOUT GUIDES ==========================================
        // New Code
        if (isset($_POST['new_workout_submit'])){
            $workoutg->addWorkoutGuides($_POST['new_workout_title'],$_POST['workout_description'], $_POST['workout_price'], $_POST['file_guide']);
        }
        // Update Code
        if (isset($_POST['workout_update_submit'])){
             $workoutg->updateWorkoutGuides($_POST['workout_id'],$_POST['workout_title'],$_POST['workout_desc'],$_POST['workout_price'], $_POST['file_guid']);
        }
        // Delete Code
        if (isset($_POST['delete-guide-submit'])){
             $workoutg->deleteWorkoutGuides($_POST['workout_id'], 'workoutguides');
        }
        // ========================================== WORKOUT GUIDES ==========================================

        // ========================================== CODES ==========================================
        // New Code
        if (isset($_POST['new_code_submit'])){
            $codes->addCode($_POST['new_code_brand'],$_POST['new_code_link'],$_POST['new_code']);
        }
        // Update Code
        if (isset($_POST['code_update_submit'])){
            $codes->updateCode($_POST['code_id'],$_POST['code_brand'],$_POST['link_update'],$_POST['code_update']);
        }
        // Delete Code
        if (isset($_POST['delete-code-submit'])){
            $codes->deleteCode($_POST['code_id'], 'codes');
        }
        // ========================================== CODES END ==========================================

        // ========================================== SOCIAL MEDIA LINKS ==========================================
        // Update Code
        if (isset($_POST['social_update_submit'])){
            $socialmedia->updateSocialMediaLinks($_POST['social_id'],$_POST['social_link_update']);
        }
        // Delete Code
        if (isset($_POST['delete-social-submit'])){
            $socialmedia->deleteSocialMediaLinks($_POST['social_id'], 'socialmedia');
        }
        // ========================================== SOCIAL MEDIA LINKS END ==========================================

        // ========================================== USERS ==========================================
        // Delete User
        if (isset($_POST['delete-user-submit'])){
            $user->deleteUser($_POST['user_id'], 'users');
        }
    }
    ?>
</head>

<body>
    <div class="admin">
    <?php include("admin-sidebar.php"); ?>
    <section class="add-item">
        <div class="content">
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mb-5 py-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">The Gymbrat Movement - Admin Portal</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <a class="nav-link text-white d-block d-sm-none" href="admin-portal.php">Home</a>
                        <a class="nav-link text-white d-block d-sm-none" href="aboutme.php">About Me</a>
                        <a class="nav-link text-white d-block d-sm-none" href="workout-guides.php">Workout Guides</a>
                        <a class="nav-link text-white d-block d-sm-none" href="codes.php">Codes & Social Media</a>
                        <a class="nav-link text-white d-block d-sm-none" href="items.php">Merchandise</a>
                        <a class="nav-link text-white d-block d-sm-none" href="blogs.php">Blogs</a>
                        <a class="nav-link text-white d-block d-sm-none" href="users.php">Users</a>
                        <a class="nav-link text-white d-block d-sm-none" href="socialmedia.php">Social Media Links</a>
                        <a class="nav-link text-white d-block d-sm-none" href="../index.php" target="_blank">Live Site</a>
                    </ul>
                </div>
            </nav>
