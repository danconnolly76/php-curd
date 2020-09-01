<?php
include_once "helpers/auth.php";
include 'models/clients.php';
$errors = array('invalid_firstname'=>'', 'invalid_lastname'=>'', 'invalid_email'=>'');
if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) 
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = validate_form($_POST['message']);
if(empty($fname) || empty($lname) || empty($email) || empty($message)) {
    header ('Location: create.php?empty-text-fields');
} else if(strlen($fname) >= 40 || !preg_match("/^[a-zA-Z\s]+$/", $fname)) {
    $errors['invalid_firstname'] = 'Firstname must be only upper or lowercase letters';
} else if(strlen($lname) >= 100 || !preg_match("/^[a-zA-Z\s]+$/", $lname)) { 
    $errors['invalid_firstname'] = 'Firstname must be only upper or lowercase letters';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['invalid_email'] = 'Enter a valid email with a @';
} else {
     Clients::insertClients($fname, $lname, $email, $message);
     header ('Location: read.php?success');
  }
}
include 'views/create_view.php';

function validate_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

