<?php
include_once  '../header.php';
include_once 'Genre.php';

$database = new DB();
$db = $database->getConnection();

$genre = new Genre($db);

$stmt = $genre->read();
$num = $stmt->rowCount();

if($num>0) {
    $genre_array = array();
    $genre_array["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $genre_item=array(
            "id" => $id,
            "name" => $name
        );
        array_push($genre_array["records"], $genre_item);
    }
    http_response_code(200);
    echo json_encode($genre_array);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No genres found."));
}