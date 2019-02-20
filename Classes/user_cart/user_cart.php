<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/19/2019
 * Time: 8:08 PM
 */

class user_cart
{
    private $conn;
    private $table_name = "user_cart";

    public $id;
    public $user_id;
    public $cart_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT t.id AS id, t.user_id AS user_id, t.cart_id AS cart_id 
        FROM " . $this->table_name . " t ORDER BY t.user_id";
    }
}