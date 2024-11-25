// Handling logout confirmation modal and other functionalities
document.addEventListener("DOMContentLoaded"), () => {
    // Log Out Modal
    const logoutButton = document.querySelector('.logout-button');
    const logoutModal = document.getElementById('logout-modal');
    const closeButton = document.querySelector('.close-button');
    const confirmLogout = document.getElementById('confirm-logout');
    const cancelLogout = document.getElementById('cancel-logout');

    if (logoutButton) {
        logoutButton.addEventListener('click', function (event) {
            event.preventDefault();
            if (logoutModal) {
                logoutModal.style.display = 'block';
            }
        });
    }

    if (closeButton) {
        closeButton.addEventListener('click', function () {
            logoutModal.style.display = 'none';
        });
    }

    if (cancelLogout) {
        cancelLogout.addEventListener('click', function () {
            logoutModal.style.display = 'none';
        });
    }

    if (confirmLogout) {
        confirmLogout.addEventListener('click', function () {
            window.location.href = 'logout.php';
        });
    }

    window.addEventListener('click', function (event) {
        if (event.target == logoutModal) {
            logoutModal.style.display = 'none';
        }
    });

    // Switch Between Sign In and Sign Up Forms
    const switchToSignUp = document.getElementById("switch-to-signup");
    const switchToSignIn = document.getElementById("switch-to-signin");

    if (switchToSignUp) {
        switchToSignUp.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(".sign-in-form").classList.add("hidden");
            document.querySelector(".sign-up-form").classList.remove("hidden");
        });
    }

    if (switchToSignIn) {
        switchToSignIn.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(".sign-up-form").classList.add("hidden");
            document.querySelector(".sign-in-form").classList.remove("hidden");
        });
    }

    // Back Button Handling
    const backButtons = document.querySelectorAll(".back-button");
    backButtons.forEach(button => {
        button.addEventListener("click", function () {
            window.history.back();
        });
    });

    // Handling Mood Tracker Submission
    const moodForm = document.getElementById('mood-form');
    if (moodForm) {
        moodForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const mood = document.getElementById('mood-select').value;
            const moodLevel = document.getElementById('mood-level').value;

            if (mood.trim() !== "") {
                generateMotivationalMessage(mood); // Generate motivational message
            } else {
                alert("Please select your mood before submitting.");
            }
        });
    }

// Function to Generate Motivational Message Based on Mood
function generateMotivationalMessage(mood) {
    const motivationalText = getMotivationalResponse(mood);

    const messageDiv = document.getElementById("motivational-message");
    const textDiv = document.getElementById("motivational-text");

    textDiv.textContent = motivationalText;
    messageDiv.classList.remove("hidden");
}

    const motivationalText = getMotivationalResponse(mood);

    const messageDiv = document.getElementById("chatbot-message");
    const textDiv = document.getElementById("motivational-text");

    textDiv.textContent = motivationalText;
    messageDiv.classList.remove("hidden");
}
