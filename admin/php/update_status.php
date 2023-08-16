<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "lucelle";
    $password = "password_123";
    $dbname = "db_test";
    
    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Validate and sanitize the inputs
    $entryId = mysqli_real_escape_string($conn, $_POST['id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the status in the database
    $query = "UPDATE contact_entries SET status = '$status' WHERE id = $entryId";
    if (mysqli_query($conn, $query)) {
        echo 'Status updated successfully!';
    } else {
        echo 'Error updating status.';
    }
}
?>
