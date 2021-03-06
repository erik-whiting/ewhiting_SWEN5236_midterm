<?php
include_once '/home/erik/localcode/midterm/Classes/header.php';
include_once '/home/erik/localcode/midterm/Classes/Movie/Movie.php';



function getMovie($movie_id) {
    $database = new DB();
    $db = $database->getConnection();

    $movie = new Movie($db);

    $stmt = $movie->full_data($movie_id);
    $num = $stmt->rowcount();

    $rating = $movie->get_vote_info($movie_id);
    $rnum = $rating->rowcount();

    if ($num>0) {
        $results_array = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            extract($rating->fetch(PDO::FETCH_ASSOC));
            $result_item = array(
                "id" => $id,
                "name" => $name,
                "from" => $from,
                "to" => $to,
                "rating" => number_format($avg, 2),
                "description" => $description,
                "director" => $director,
                "votes" => $votes,
                "gross" => $gross
            );
            array_push($results_array, $result_item);
        }
        http_response_code(200);
        return json_encode($results_array);
    } else {
        echo json_encode(array("message" => "No record found for that movie"));
    }
}

