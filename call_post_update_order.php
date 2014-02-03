<?php
session_start();
	// report all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// load the SureDone library
require_once ('includes/SureDone_Startup.php');

$token =  isset($_SESSION['token'])?$_SESSION['token']:'';

echo "---- Update order ----<br>";

$order = array('order' => $_REQUEST['order_id'], $_REQUEST['field_name'] => $_REQUEST['field_value']);
$result = SureDone_Store::update_order($order, $token, isset($_SESSION['username'])?$_SESSION['username']:'');

print_r($result);

?>