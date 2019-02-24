<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/Cart/Cart.php';

$database = new DB();
$db = $database->getConnection();

$movie_id = $_GET['movie'];
$user_id = $_GET['user'];
$cart= new Cart($db);

$cart->add_to_cart($movie_id, $user_id);