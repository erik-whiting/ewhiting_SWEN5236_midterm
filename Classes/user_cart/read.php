<?php
include_once  '../header.php';
include_once 'user_cart.php';

$database = new DB();
$db = $database->getConnection();

$usercart = new user_cart($db);

$stmt = $usercart->read();
$num = $stmt->rowcount();

if($num>0) {
    $results_array = array();
    $results_array["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item=array(
            "id" => $id,
            "user_id" => $user_id,
            "cart_id" => $cart_id
        );
        array_push($results_array["records"], $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No records found."));
}