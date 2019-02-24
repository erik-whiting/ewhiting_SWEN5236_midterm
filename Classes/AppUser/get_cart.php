<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/AppUser/AppUser.php';

$database = new DB();
$db = $database->getConnection();

$user = new AppUser($db);
$user_id = $_GET['user'];

$stmt = $user->getCart($user_id);
$num = $stmt->rowcount();
$counts = $user->getCountAndPrice($user_id);

if ($num > 0) {
    $results_array = array();
    $results_array["items"] = array();
    $results_array["receipt"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item = array(
            "movie" => $movie_name,
            "price" => $movie_price,
            "cart_count" => $cart_count,
            "subtotal" => $cart_price,
            "tax" => number_format($cart_price * 0.08, 2),
            "total" => number_format($cart_price + ($cart_price * 0.08), 2)
        );
        array_push($results_array["items"], $result_item);
    }
    extract($counts->fetch(PDO::FETCH_ASSOC));
    $price_array = array("tax" => number_format($cart_price * 0.08, 2),
        "total" => number_format($cart_price + ($cart_price * 0.08), 2));
    array_push($results_array["items"], $price_array);
    http_response_code(200);
    echo json_encode($results_array);
} else {
    echo json_encode(array("message" => "This Cart is empty"));
}
