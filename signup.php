<?php 
ob_start();
// include header.php file
include("header.php");
?>

<body>
<?php 
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invaliduid"){
            echo "<p>Choose a proper username!</p>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Enter a valid email</p>";
        }
        else if($_GET["error"] == "passwordunmatch"){
            echo "<p>Passwords do not match.</p>";
        }
        else if($_GET["error"] == "stmtfail"){
            echo "<p>Something went wrong. Please try again.</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Username is taken</p>";
        }
        
    }
?>

<section class="py-5">
    <div class="signup-form py-5">
        <div class="d-flex justify-content-center h-100">
        <div class="card">
			<div class="card-header">
                <h3>Sign Up</h3>
                <p class="links">Please fill in this form to create an account!</p>
                <hr>
            </div>
            <div class="card-body">
                <form action="includes/signup.inc.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">First Name</span>
						</div>
                        <input type="text" class="form-control" name="firstname" required="required">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">Last Name</span>
						</div>
                        <input type="text" class="form-control" name="lastname" required="required">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">Username</span>
						</div>
                        <input type="text" class="form-control" name="username" required="required">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">Email</span>
						</div>
                        <input type="email" class="form-control" name="email" required="required">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">Password</span>
						</div>
                        <input type="password" class="form-control" name="password" required="required">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							<span class="input-group-text">Confirm Password</span>
						</div>
                        <input type="password" class="form-control" name="confirm_password" required="required">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" required="required">
                        <label class="form-check-label links">I accept the <a href="https://www.websitepolicies.com/policies/view/3tOnLCjb" target="_blank">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Sign Up" class="btn float-right login_btn">
                    </div>
                </form>
            </div>      
            <div class="text-center links">Already have an account? <a href="login.php">Login here</a></div>
        </div>
    </div>
    </div>
</section>  
</body>

<?php 
include('footer.php')
 ?>

<style>
#main-site{
background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
font-family: 'Numans', sans-serif;
}
</style>