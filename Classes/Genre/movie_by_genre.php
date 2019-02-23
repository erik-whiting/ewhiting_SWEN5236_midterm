<?php
include_once '../header.php';
include_once 'Genre.php';
include_once '../Movie/Movie.php';

$database = new DB();
$db = $database->getConnection();

$genre = new Genre($db);
$movie = new Movie($db);
$genre_id = $_GET['genre'];

$stmt = $genre->getMovies($genre_id);
$num = $stmt->rowcount();

if ($num>0) {
    $results_array = array();
    $results_array["movies"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $movie_stmt = $movie->full_data($row["movie"]);
        $movie_num = $movie_stmt->rowcount();
        if ($movie_num > 0) {
            while ($movie_row = $movie_stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($movie_row);
                $result_item = array (
                    "name" => $name,
                    "from" => $from,
                    "to" => $to,
                    "rating" => $rating,
                    "director" => $director,
                    "description" => $description,
                    "votes" => $votes,
                    "gross" => $gross
                );
                array_push($results_array["movie"], $result_item);
            }
        }
        else {
            echo json_encode(array("message" => "Couldn't find any movies in that genre"));
        }
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No records found"));
}