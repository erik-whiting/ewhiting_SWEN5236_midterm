<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:06 PM
 */

class AppUser
{
    private $conn;
    private $table_name = "AppUser";

    public $id;
    public $user_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.user_name AS user_name FROM " . $this->table_name . " t ORDER BY t.name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function getCart($user_id) {
        $query = "SET @user_cart := (SEELCT id FROM Cart WHERE user_id = " . $user_id .
            " AND active = 1;
            SELECT m.name AS 'movie_name', m.price AS 'movie_price' FROM movie_cart mc
            INNER JOIN Movie m
            ON mc.movie_id = m.id
            WHERE cart_id = @user_cart";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function getCountAndPrice($user_id) {
        $query = "SET @user_cart := (SEELCT id FROM Cart WHERE user_id = " . $user_id . ")" .
            " AND active = 1;
            SELECT COUNT(m.name) AS 'cart_count', 
            SUM(m.price) AS 'cart_price' FROM movie_cart mc
            INNER JOIN Movie m
            ON mc.movie_id = m.id
            WHERE cart_id = @user_cart";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}
