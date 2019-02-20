<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/18/2019
 * Time: 11:57 PM
 */

class DB
{
    private $servername = "localhost";
    private $username = "erik";
    private $db_name = "ewhiting_midterm";
    private $password = "abc123";
    public $conn;

    function getConnection() {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->servername .
                ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}