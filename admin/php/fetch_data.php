<?php
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

// Function to fetch data from MySQL
function fetchContactEntries($conn) {
    $query = "SELECT * FROM contact_entries";
    $result = mysqli_query($conn, $query);
    return $result;
}

$contact_entries = fetchContactEntries($conn);
?>