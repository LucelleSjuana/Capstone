<?php
// Function to count the number of applications with a specific status
function countApplicationsByStatus($conn, $status) {
    $query = "SELECT COUNT(*) AS count FROM contact_entries WHERE status='$status'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

// Function to count the total number of applications
function countAllApplications($conn) {
    $query = "SELECT COUNT(*) AS count FROM contact_entries";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}
?>
