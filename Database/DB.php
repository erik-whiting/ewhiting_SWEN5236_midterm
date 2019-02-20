<?php
/**
 * Created by PhpStorm.
 * User: eedee
 * Date: 2/18/2019
 * Time: 11:57 PM
 */

class DB
{
    public $servername = "localhost";
    public $username = "erik@localhost";
    public $db_name = "ewhiting_midterm";
    public $password = "Eagle200";

    function getConnectionString() {
        return "mysql:host=$this->servername;dbname=$this->db_name";
    }

}