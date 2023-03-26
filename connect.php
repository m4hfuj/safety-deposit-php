<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safety_deposit";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>