<?php

// Use to fetch product data
class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getUsers($table = 'users'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function emptyInputsSignup($firstName, $lastName, $userName, $email, $password, $confirm_password){
        $result = false;
        if(empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($password) || empty($confirm_password)){
            $result = true;
        }
        else{
            $result = false;
        }
        return  $result;
    }

    public function invadlidUid($userName){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
            $result = true;
        }
        else{
            $result = false;
        }
        return  $result;
    }

    public function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return  $result;
    }

    public function pwdMatch($password, $confirm_password){
        $result;
        if($password !== $confirm_password){
            $result = true;
        }
        else{
            $result = false;
        }
        return  $result;
    }

    public function uidExists($userName, $email){

        $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfail");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
             return $row;
        }
        else{
            $result = false;
            return false;
        }
        mysqli_stmt_close($stmt);
    }

    public function createUser($firstName, $lastName, $userName, $email, $password){

        //$this->db->con->query("INSERT INTO `users`(firstName, lastName, userName, userEmail, userPassword) VALUES ('{$firstName}', '{$lastName}', '{$userName}', '{$email}', '{$password}' )");

        $sql = "INSERT INTO users(firstName, lastName, userName, userEmail, userPassword) VALUES (?,?,?,?,?);";
        $stmt = mysqli_stmt_init($this->db->con);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $userName, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../login.php?error=none");
        exit();

    }

    // delete blog using blog id
    public function deleteUser($user_id = null, $table = 'users'){
        if($user_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE usersId={$user_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']."?userdelete=success");
            }
            return $result;
        }
    }

    public function emptyInputLogin($userName,$password){
        $result = false;
        if(empty($userName) || empty($password)){
            $result = true;
        }
        else{
            $result = false;
        }
        return  $result;
    }

    public function loginUser($userName, $password){

         $uidExists = $this->uidExists($userName, $userName);

         print_r($uidExists);
        if($uidExists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists['userPassword'];
        $checkPwd = password_verify($password, $pwdHashed);

        if($checkPwd === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }else if($checkPwd === true){
            session_start();

            if($uidExists['usersId'] == 34 && $uidExists['userName'] == 'admin'){
                header("location: ../admin/items.php");
                exit();
            }
            $_SESSION['userId'] = $uidExists['usersId'];
            $_SESSION['userName'] = $uidExists['userName'];
            header("location: ../index.php");
            exit();
        }
    }

}