<?php
include_once "helpers/auth.php";
include_once('models/clients.php');
$clientId = isset($_GET['id']) ? $_GET['id'] : '';
$client = Clients::getClientsId($clientId);
include 'views/single_view.php';
?>