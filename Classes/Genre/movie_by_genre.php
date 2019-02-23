<?php
include_once '../header.php';
include_once 'Genre.php';
include_once '../Movie/full_data.php';

$database = new DB();
$db = $database->getConnection();

$genre = new Genre($db);

$genre_id = $_GET['genre'];

$stmt = $genre->getMovies($genre_id);
$num = $stmt->rowcount();

if ($num > 0) {
    $results_array = array();
    $results_array["movies"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item = getMovie($movie);
        array_push($results_array, $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    echo json_encode(array("message" => "Could not find requested data"));
}
