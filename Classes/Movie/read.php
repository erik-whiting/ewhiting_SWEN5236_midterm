<?php
include_once  '/home/erik/localcode/midterm/Classes/header.php';
include_once 'Movie.php';

$database = new DB();
$db = $database->getConnection();

$movie = new Movie($db);

$stmt = $movie->read();
$num = $stmt->rowcount();

if($num>0) {
    $results_array = array();
    $results_array["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item=array(
            "id" => $id,
            "name" => $name,
            "year_from" => $year_from,
            "year_to" => $year_to,
            "description" => $description,
            "gross" => $gross,
            "price" => $price,
            "director_id" => $director_id,
            "picture_path", $picture_path
        );
        array_push($results_array["records"], $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No records found."));
}