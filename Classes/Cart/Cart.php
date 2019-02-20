<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:06 PM
 */

class Cart
{
    private $conn;
    private $table_name;

    public $id;
    public $date;
    public $active;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id, t.date, t.active FROM " . $this->table_name . " t ORDER BY t.date";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}