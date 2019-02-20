<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:07 PM
 */

class movie_cart
{
    private $conn;
    private $table_name = "movie_cart";

    public $id;
    public $movie_id;
    public $cart_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.movie_id AS movie_id, t.cart_id AS cart_id
        FROM " . $this->table_name . " t ORDER BY movie_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}