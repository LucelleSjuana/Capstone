<?php

// Start the session or resume an existing session
session_start();

// Database connection details
$servername = "localhost";
$username = "lucelle";
$password = "password_123";
$dbname = "db_test";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>