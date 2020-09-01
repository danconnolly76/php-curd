<?php
include_once "helpers/auth.php";
include_once('models/clients.php');
$errors = array('emptyboxes'=>'', 'invalid_firstname'=>'', 'invalid_lastname'=>'', 'invalid_email'=>'');
$clientId= isset($_GET['id']) ? $_GET['id'] : '';
$client = Clients::getClientsId($clientId);

$id = "";
$fname = "";
$lname = "";
$email = "";
$message = "";
if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(strlen($fname) >= 40 || !preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $errors['invalid_firstname'] = 'Firstname must be only upper or lowercase letters';
    } else if(strlen($lname) >= 80 || !preg_match("/^[a-zA-Z\s]+$/", $lname)) { 
        $errors['invalid_lastname'] = 'Lastname must be only upper or lowercase letters';
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['invalid_email'] = 'Enter a valid email with a @';
    } else {
        Clients::updateClients($id, $fname, $lname, $email, $message); 
         header ('Location: read.php?success');
      }
}
include 'views/edit_view.php';

?>