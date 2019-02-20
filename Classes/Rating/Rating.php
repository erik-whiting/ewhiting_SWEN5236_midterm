<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:07 PM
 */

class Rating
{
    private $conn;
    private $table_name = "Rating";

    public $id;
    public $value;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.value AS value FROM " . $this->table_name . " t ORDER BY t.value";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}