<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hash the password

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            // Set a cookie for the user's email/phone
            setcookie('user_email', $email, time() + (86400 * 30), "/"); // Cookie lasts for 30 days
            
            // Redirect the user to the login page
            header("Location: home.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkEmail->close();
    $conn->close();
}
