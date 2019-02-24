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

    function handle_checkout($user_id) {
        $query = "UPDATE Cart SET active = 0 WHERE user_id = " . $user_id . "  
            AND active = 1;
            INSERT  INTO Cart (date, active, user_id) 
            VALUES (NOW(), 1, " . $user_id . ")";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}