<?php

include 'db_connection.php';

// Get form data
$username = $_POST["username"];
$password = $_POST["password"];

// Prepare and execute the SQL query to fetch user data
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User is authenticated

    // Fetch user data
    $row = $result->fetch_assoc();
    $userType = $row["user_type"];

    // Set user type in the session for future use
    $_SESSION["user_type"] = $userType;

    // Redirect user based on user type
    if ($userType == "admin") {
        header("Location: admin_page.php");
    } else {
        header("Location: employee_page.php");
    }
} else {
    // User is not authenticated
    header("Location: login.php?error=1");
}

// Close the database connection
?>
