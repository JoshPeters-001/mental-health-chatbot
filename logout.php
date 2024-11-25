<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Remove the user from the active_users table
    $stmt = $conn->prepare("DELETE FROM active_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();
}

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login/signup page
header("Location: login_signup.html");
exit();
?>

