<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/AppUser/AppUser.php';

$database = new DB();
$db = $database->getConnection();

$user = new AppUser($db);
$user_id = $_GET['user'];
$discount_pct = $_GET['discount'];
$discount_pct = number_format($discount_pct * 0.01, 2);
$discount = number_format(1 - $discount_pct, 2);

$stmt = $user->getCart($user_id);
$num = $stmt->rowcount();
$counts = $user->getCountAndPrice($user_id);

if ($stmt) {
    $results_array = array();
    $results_array["items"] = array();
    $results_array["receipt"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item = array(
            "movie" => $movie_name,
            "price" => $movie_price
        );
        array_push($results_array["items"], $result_item);
    }
    extract($counts->fetch(PDO::FETCH_ASSOC));
    $price_array = array(
        "subtotal" => number_format($cart_price, 2),
        "cart_count" => $cart_count,
        "tax" => number_format($cart_price * 0.08, 2),
        "total" => number_format($cart_price + ($cart_price * 0.08), 2));
    $price_array["subtotal"] *= $discount;
    $price_array["tax"] *= $discount;
    $price_array["savings"] = number_format($price_array["total"] - ($price_array["total"] * $discount), 2);
    $price_array["total"] *= $discount;
    array_push($results_array["receipt"], $price_array);
    http_response_code(200);
    echo json_encode($results_array);
} else {
    $results_array["items"] = array();
    $results_array["receipt"] = array();
    $result_item = array(
        "movie" => 0,
        "price" => 0,
    );
    array_push($results_array["items"], $result_item);
    $price_array = array(
        "cart_count" => 0,
        "tax" => 0,
        "total" => 0
    );
    array_push($results_array["receipt"], $price_array);
    http_response_code(200);
    echo json_encode($results_array);
}
