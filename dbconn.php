<?php
$servername = "localhost";
$username = "root";
$password = ""; // Change if you have set a password
$database = "crud_operations";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>