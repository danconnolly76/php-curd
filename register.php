<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire'); 
session_start();
include 'models/users.php';
$errors = array('emptyboxes'=>'', 'invalid_username'=>'', 'invalid_firstname'=>'', 'invalid_email'=>'', 'invalid_lastname'=>'', 'invalid_password'=>'', 'check_username'=>'');
$message = "This is an error message!";
$username = "";
$fname = "";
$lname = "";
$email = "";
$password = "";
if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
    $username = validate_form($_POST['username']);
    $fname = validate_form($_POST['fname']);
    $lname = validate_form($_POST['lname']);
    $email = validate_form($_POST['email']);
    $password = validate_form($_POST['password']);
if(empty($username) || empty($fname) || empty($lname) || empty($email) || empty($password)) {
    $errors['emptyboxes'] = 'All Fields are mandatory';
} else if(strlen($username) >= 25 || !preg_match("/^[a-zA-Z\s]+$/", $username)) {
    $errors['invalid_username'] = 'Username must be only upper and lowercase letters';
    }
     else if(strlen($fname) >= 40 || !preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $errors['invalid_firstname'] = 'Firstname must be only upper and lowercase letters';
     } 
     else if(strlen($lname) >= 50 || !preg_match("/^[a-zA-Z\s]+$/", $lname)) {
        $errors['invalid_lastname'] = 'Lastname must be only upper and lowercase letters';
     }
     else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['invalid_email'] = 'Must be a valid email address';
     }
     else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $errors['invalid_password'] = 'Password must contain one lowercase one uppercase and one number';
    } 
    else if (Users::checkUsername($username)) {
        $errors['check_username'] = 'User name already exists';
    } 
    else if(Users::insertUsers($username, $fname, $lname, $email, $password)) {
            $_SESSION['username'] = $username;
            header ('Location: read.php?success');
            exit();   
        } else {
            header ('Location: register.php?error'); 
        } 
  }
  include 'views/register_view.php';
function validate_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

