<?php
ob_start();

// require functions.php file
 require ('../functions.php');

if(isset($_POST['submit'])){

    $userName = $_POST['username'];
    $password = $_POST['password'];

    if($user->emptyInputLogin($userName,$password) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    $user->loginUser($userName,$password);


}else{
    header("location: ../login.php");
    exit();
}