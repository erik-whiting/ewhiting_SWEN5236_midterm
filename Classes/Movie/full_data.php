<?php
include_once('../header.php');
include_once ('Movie.php');

$database = new DB();
$db = $database->getConnection();

$movie = new Movie($db);

$stmt = $movie->full_data(1);
$num = $stmt->rowcount();

if ($num > 0) {
    $results_array = array();
    $results_array["movie"];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item = array(
            "id" => $id,
            "name" => $name,
            "year_from" => $from,
            "to" => $to
//            "rating" => $rating,
//            "description" => $description,
//            "director" => $director,
//            "votes" => $votes,
//            "gross" => $gross
        );
        array_push($results_array["movie"], $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    echo json_encode(array("message" => "No record found for that movie"));
}