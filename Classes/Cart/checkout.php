<?php
include_once  '../header.php';
include_once 'Cart.php';

$database = new DB();
$db = $database->getConnection();

$user_id = $_GET['user'];
$cart= new Cart();

$cart->handle_checkout($user_id);