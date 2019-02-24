<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/AppUser/AppUser.php';

$database = new DB();
$db = $database->getConnection();

$user = new AppUser($db);
$user_id = $_GET['user'];

$stmt = $user->getCart($user_id);
$num = $stmt->rowCount();
$counts = $user->getCountAndPrice($user_id);

if ($num > 0) {
    $results_array = array();
    $results_array["items"] = array();
    $results_array["receipt"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row != null) {
            extract($row);
            $result_item = array(
                "movie" => $movie_name,
                "price" => $movie_price
            );
            extract($counts->fetch(PDO::FETCH_ASSOC));
            $price_array = array("subtotal" => number_format($cart_price, 2),
                "cart_count" => ($cart_count != null ? $cart_count : 0),
                "tax" => number_format($cart_price * 0.08, 2),
                "total" => number_format($cart_price + ($cart_price * 0.08), 2));
            array_push($results_array["receipt"], $price_array);
            array_push($results_array["items"], $result_item);
        } else {
            $result_item = array(
                "movie" => 0,
                "price" => 0
            );
            $price_array = array(
                "subtotal" => 0,
                "cart_count" => 0,
                "tax" => 0,
                "total" => 0
            );
            array_push($results_array["receipt"], $price_array);
            array_push($results_array["items"], $result_item);
        }

    }

    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(200);
    echo json_encode(array("message" => "Something went wrong"));
}
