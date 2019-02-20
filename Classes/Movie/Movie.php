<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:07 PM
 */

class Movie
{
    private $conn;
    private $table_name = "Movie";

    public $id;
    public $name;
    public $year_from;
    public $year_to;
    public $description;
    public $gross;
    public $price;
    public $director_id;
    public $picture_path;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.name AS name, t.year_from as year_from,
                    t.year_to AS year_to, t.description AS description, t.gross AS gross,
                    t.price AS price, t.director_id AS director_id, t.picture_path AS 
                      picture_path " . $this->table_name . " t ORDER BY t.name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}