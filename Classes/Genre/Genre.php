<?php

class Genre
{
    private $conn;
    private $table_name = "Genre";

    public $id;
    public $name;
    public $picture_path;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.name AS name, t.picture_path AS picture_path FROM "
            . $this->table_name . " t ORDER BY t.name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}