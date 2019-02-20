<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 7:31 PM
 */

class Genre
{
    private $conn;
    private $table_name = "Genre";

    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.name AS name FROM " . $this->table_name . " t ORDER BY t.name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}