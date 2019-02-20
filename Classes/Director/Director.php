<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:06 PM
 */

class Director
{
    private $conn;
    private $table_name = "Director";

    public $id;
    public $first_name;
    public $last_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.first_name AS first_name, t.last_name AS 
          last_name FROM " . $this->table_name . " t ORDER BY t.last_name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}