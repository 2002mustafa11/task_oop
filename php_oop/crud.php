<?php

require_once 'Validation.php';
require_once 'Database.php';

class crud extends Database{
    use Validation;
    public $data=[];
    private $error;

    function __construct($data)
    {
        parent::__construct();
        if (isset($this->validate($data)['error'])) {
            $this->error=$this->validate($data);
        }elseif(isset($this->validate($data)['data'])){
            $this->data=$this->validate($data);
        }
        $this->data=$this->validate($data);
        

        print_r($this->error);
        
        
    }

    function insert($table) {
        if (isset($this->error)) {
            return ;
        }
        $columns = implode(", ", array_keys($this->data));
        $values = "'" . implode("', '", array_values($this->data)) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function select($table, $columns = "*", $where = null) {
        $sql = "SELECT $columns FROM $table";

        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
}