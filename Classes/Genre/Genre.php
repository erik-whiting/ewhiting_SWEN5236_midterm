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

    function getMovies($genre_id) {
        $query = "SELECT m.id AS 'movie', g.name AS 'genre_name' FROM Genre g
                    INNER JOIN movie_genre mg
                    ON mg.genre_id = g.id
                    INNER JOIN Movie m
                    ON m.id = mg.movie_id
                    WHERE g.id = " . $genre_id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}