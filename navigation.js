// Smooth Scroll for Navigation Links
document.querySelectorAll('.navigation a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').slice(1);
        document.getElementById(targetId).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

// Tab Navigation for Sign In/Sign Up
const tabLinks = document.querySelectorAll('.tablink');
tabLinks.forEach(link => {
    link.addEventListener('click', function () {
        tabLinks.forEach(link => link.classList.remove('active'));
        this.classList.add('active');

        const targetForm = this.getAttribute('data-target');
        document.querySelectorAll('.form-content').forEach(form => form.style.display = 'none');
        document.getElementById(targetForm).style.display = 'block';
    });
});

// Default load for Sign In/Sign Up
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('sign-in-form').style.display = 'block'; // Show sign-in by default
    tabLinks[0].classList.add('active');
});
