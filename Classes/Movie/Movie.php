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

    function full_data($id) {
        $query = "SELECT m.id, m.name AS 'name', m.year_from AS 'from', m.year_to AS 'to', " .
           "m.description AS 'description', 
           CONCAT(d.first_name, \" \", d.last_name) AS \"director\", 
           m.gross AS 'gross'
        FROM Movie m
        INNER JOIN Director d on m.director_id = d.id
        WHERE m.id = " . $id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function get_vote_info($id) {
        $query = "SELECT AVG(rating_id) AS 'avg', COUNT(rating_id) AS 'votes' 
                  FROM movie_rating WHERE movie_id = " . $id;
        $stmt = $this->conn->prepare($query);
        $avg = $stmt->execute();

        return $stmt;
    }
}