<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_signup.html");
    exit();
}
?>

<!DOCTYPE html>
<htlang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Mental Health Support</title>
    <link rel="stylesheet" href="styles.css">
</head>

<bod>
    <!-- Header Section -->
    <header class="site-header">
        <div class="header-container">
            <img src="assets/logo.png" alt="Logo" class="logo">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
            <nav class="navigation">
                <ul>
                    <li><a href="chat.html">Chat</a></li>
                    <li><a href="resources.html">Resources</a></li>
                    <li><a href="advice.html">Advice</a></li>
                    <li><a href="mood_tracker.html">Mood Tracker</a></li>
                    <li><a href="logout.php" class="logout-button">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <h2>Your Mental Health Matters</h2>
            <p>We are here to provide you with support, guidance, and tools to ensure your well-being. Use the navigation above to access the resources we offer.</p>
            <a href="chat.html" class="start-chat-btn">Let's Chat</a>
        </div>
        </div>
    </section>

    <!-- Section Descriptions -->
    <section class="info-sections">
        <div class="info-box">
            <h3>Resources</h3>
            <p>Find contacts, websites, and support groups to assist with your mental health journey.</p>
            <a href="resources.html" class="learn-more-btn">Learn More</a>
        </div>
        <div class="info-box">
            <h3>Daily Advice</h3>
            <p>Read tips and guidance on maintaining a balanced and positive mental health.</p>
            <a href="advice.html" class="learn-more-btn">Learn More</a>
        </div>
        <div class="info-box">
            <h3>Mood Tracker</h3>
            <p>Track your daily emotions to help understand your mental health patterns.</p>
            <a href="mood_tracker.html" class="learn-more-btn">Track Mood</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <p>&copy; 2024 Mental Health Chatbot. All rights reserved.</p>
    </footer>

    <!-- Logout Confirmation Modal -->
    <div id="logout-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Are you sure you want to log out?</h2>
            <button id="confirm-logout" class="logout-confirm-btn">Yes, Log Out</button>
            <button id="cancel-logout" class="logout-cancel-btn">Cancel</button>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="scripts.js"></script>
</body>
</html>
