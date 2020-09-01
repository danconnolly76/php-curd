<?php
include_once "helpers/auth.php";
include_once('models/clients.php');
$readClient = Clients::readClients();
$db = Connection::getConnection();
//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 5;
//Positioning
$firstpage = ($page > 1) ? ($page * $perPage) - $perPage : 0;
//Query
$readClient = $db->prepare("
   SELECT SQL_CALC_FOUND_ROWS * FROM clients LIMIT {$firstpage}, {$perPage};
");
$readClient->execute();
$readClient = $readClient->fetchAll(PDO::FETCH_ASSOC);
//Total pages
$total_pages = $db->query("SELECT FOUND_ROWS() as total_pages
")->fetch()['total_pages'];
$pages = ceil($total_pages / $perPage);
require 'views/read_view.php';
?>