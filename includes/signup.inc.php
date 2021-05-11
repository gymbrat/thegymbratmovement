<?php 
ob_start();

// require functions.php file
 require ('../functions.php');


if(isset($_POST['submit'])){
   
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if($user->emptyInputsSignup($firstName, $lastName, $userName, $email, $password, $confirm_password) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if($user->invadlidUid($userName) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if($user->invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if($user->pwdMatch($password, $confirm_password) !== false){
        header("location: ../signup.php?error=passwordunmatch");
        exit();
    }
    
    if($user->uidExists($userName, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    $user->createUser($firstName, $lastName, $userName, $email, $password);

}else{
    header("location: ../signup.php");
    exit();
}

