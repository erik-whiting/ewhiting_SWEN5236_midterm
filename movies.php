<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//include_once './Classes/header.php';
//include_once './Classes/Genre/Genre.php';
//include_once './Classes/Movie/full_data.php';
//
//$database = new DB();
//$db = $database->getConnection();
//
//$genre = new Genre($db);
//
$genre_id = $_GET['genre'];
//
//$stmt = $genre->getMovies($genre_id);
//$num = $stmt->rowcount();

//if ($num > 0) {
//    $results_array = array();
//    $results_array["movies"] = array();
//    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        extract($row);
//        $result_item = getMovie($movie);
//        array_push($results_array["movies"], $result_item);
//    }
//    http_response_code(200);
//    echo json_encode($results_array);
//} else {
//    echo json_encode(array("message" => "Could not find requested data"));
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="frontend/css/style.css">

</head>
<body>
<div class="jumbotron">
    <div class="container text-center">
        <h1>Browse Popular Movies</h1>
    </div>
</div>
</body>
</html>
