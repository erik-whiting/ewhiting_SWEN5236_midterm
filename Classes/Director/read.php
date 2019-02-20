<?php
include_once  '../header.php';
include_once 'Director.php';

$database = new DB();
$db = $database->getConnection();

$director = new Director($db);

$stmt = $director->read();
$num = $stmt->rowcount();

if($num>0) {
    $results_array = array();
    $results_array["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $result_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name
        );
        array_push($results_array["records"], $result_item);
    }
    http_response_code(200);
    echo json_encode($results_array);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No records found."));
}