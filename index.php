<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire'); 
session_start();
$username = "";
$password = "";
include 'models/users.php';
$errors = array('emptyboxes'=>'', 'invalid_username'=>'', 'invalid_password'=>'', 'invalid_input'=>'');
 if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['login_button']))
 {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $conn = Connection::getConnection();
     if(empty($username) || empty($password)) {
        $errors['emptyboxes'] = 'Must enter username and password';
    } else if (strlen($username) >= 40 || !preg_match("/^[a-zA-Z\s]+$/", $username)) {
        $errors['invalid_username'] = 'Username must be only upper and lowercase letters';  
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $errors['invalid_password'] = 'Password must contain one lowercase, one uppercase letter, one number and be at least 8 characters long';
    } else if(Users::loginUsers($username, $password))
        {
            $_SESSION['username'] = $username;
            header ('Location: read.php');
            exit();
        } else {
            $errors['invalid_input'] = 'Incorrect Username and Password';
        }
}       
 
include 'views/login_view.php'

?>

