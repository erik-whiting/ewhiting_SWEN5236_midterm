<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:07 PM
 */

class movie_star
{
    private $conn;
    private $table_name = "movie_star";

    public $id;
    public $movie_id;
    public $star_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.movie_id AS movie_id, t.star_id AS star_id 
        FROM " . $this->table_name . " t ORDER BY t.movie_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}