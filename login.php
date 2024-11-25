<?php
session_start();
require 'db_connection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the active user limit has been reached
    $sql = "SELECT COUNT(*) AS active_user_count FROM active_users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $active_user_count = $row['active_user_count'];

    if ($active_user_count >= 50) {
        echo "The system is currently at full capacity. Please try again later.";
        exit();
    }

    // Validate user credentials
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        // Store user ID and username in the session
        $_SESSION['user_id'] = $user_id;

        // Add user to the active_users table
        $insert_stmt = $conn->prepare("INSERT INTO active_users (username) VALUES (?)");
        $insert_stmt->bind_param("s", $email); // Use email or username
        $insert_stmt->execute();
        $insert_stmt->close();

        header("Location: login_signup.html"); // Redirect to the home page
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
