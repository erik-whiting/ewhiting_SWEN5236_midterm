<?php
include_once  '../header.php';
include_once 'Genre.php';

$database = new DB();
$db = $database->getConnection();

function getGenres() {
    $genre = new Genre($this->db);

    $stmt = $genre->read();
    $num = $stmt->rowCount();

    if($num>0) {
        $results_array = array();
        $results_array["records"]=array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $result_item=array(
                "id" => $id,
                "name" => $name,
                "picture_path" => $picture_path
            );
            array_push($results_array["records"], $result_item);
        }
        return $results_array["records"];
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "No records found."));
    }
}

echo getGenres();