<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $uemail = $_POST["uemail"];
    $mobile = $_POST["mobile"];
    $appdate = $_POST["appdate"];
    $apptime = $_POST["apptime"];
    $message = $_POST["message"];

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

    // Inserting of data into the database
    $sql = "INSERT INTO contact_entries (fname, sname, uemail, mobile, appdate, apptime, message) 
            VALUES ('$fname', '$sname', '$uemail', '$mobile', '$appdate', '$apptime', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.html#register");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
