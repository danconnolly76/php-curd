<?php
include_once "helpers/auth.php";
include_once('models/clients.php');
$clientId=isset($_GET['id']) ? $_GET['id'] : '';
if(Clients::deleteClients($clientId)) {
    $msg="<p>Deleted gym class with id of ".$clientId." from the database.</p>";
}else{
    $msg="<p>There was a problem deleting the record.</p>";  
}

include 'read.php'
?>

