<?php
include_once  '../header.php';
include_once 'movie_rating.php';

$database = new DB();
$db = $database->getConnection();

$movierating = new movie_rating($db);

$stmt = $movierating->read();
$num = $stmt->rowcount();

if($num>0) {
    $results_array = array();
    $results_array["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item=array(
            "id" => $id,
            "movie_id" => $movie_id,
            "rating_id" => $rating_id
        );
        array_push($results_array["records"], $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No records found."));
}