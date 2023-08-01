<?php
require_once 'crud.php';
$data = array('name' => 'mustafa', 'email' => 'mustafa@example.com');
$database = new crud($data);


if ($database->insert('users')) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data.";
}
/*
$data = $database->select('users', '*', "name = 'John'");
if ($data) {
    print_r($data);
} else {
    echo "No data found.";
}*/