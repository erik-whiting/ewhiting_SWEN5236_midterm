<?php

require_once "Database/DB.php";

$db = new DB();
$conn = new PDO($db->getConnectionString(), $db->username, $db->password);
$stmt = $conn->prepare("SELECT * FROM Rating");
$stmt->execute();

$result = $stmt->fetchAll();
echo $result;