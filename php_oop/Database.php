<?php
abstract class Databases
{
    private $host;
    private $username;
    private $password;
    private $database;
    protected $conn;

}
class Database extends Databases{
    
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "database";
    protected $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}