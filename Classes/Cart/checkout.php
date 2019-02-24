<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/Cart/Cart.php';

$database = new DB();
$db = $database->getConnection();

$user_id = $_GET['user'];
$cart= new Cart($db);

$cart->handle_checkout($user_id);