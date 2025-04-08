document.addEventListener('DOMContentLoaded', function() {
    // Event listener for showing the registration form when the user clicks on the 'showRegistrationForm' link
    document.getElementById('showRegistrationForm').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the link (navigation)
        
        // Get the login and registration forms
        var loginForm = document.querySelector('.loginForm');
        var registrationForm = document.querySelector('.registration-form');
        
        // Add the 'hide-form' class to the login form to start hiding it with animation
        loginForm.classList.add('hide-form');
        
        // After a 500ms delay (to allow the animation to complete), hide the login form and show the registration form
        setTimeout(function() {
            loginForm.style.display = 'none'; // Actually hide the login form
            registrationForm.style.display = 'block'; // Show the registration form
            registrationForm.classList.remove('hide-form'); // Remove the hide-form class to allow the registration form to show
        }, 500);
    });

    // Event listener for showing the login form when the user clicks on the 'showLoginForm' link
    document.getElementById('showLoginForm').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the link (navigation)
        
        // Get the login and registration forms
        var loginForm = document.querySelector('.loginForm');
        var registrationForm = document.querySelector('.registration-form');
        
        // Add the 'hide-form' class to the registration form to start hiding it with animation
        registrationForm.classList.add('hide-form');
        
        // After a 500ms delay (to allow the animation to complete), hide the registration form and show the login form
        setTimeout(function() {
            registrationForm.style.display = 'none'; // Actually hide the registration form
            loginForm.style.display = 'block'; // Show the login form
            loginForm.classList.remove('hide-form'); // Remove the hide-form class to allow the login form to show
        }, 500);
    });

    // Event listener for the forgot password link
    document.getElementById('forgotPassword').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the link
        // Add code here to handle forgot password functionality (e.g., show a reset password form or send an email)
    });

    // Event listener for the login link in the registration form (navigates back to the login form)
    document.querySelector('.registration-form small a').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the link (navigation)
        
        // Get the login and registration forms
        var loginForm = document.querySelector('.loginForm');
        var registrationForm = document.querySelector('.registration-form');
        
        // Add the 'hide-form' class to the registration form to start hiding it with animation
        registrationForm.classList.add('hide-form');
        
        // After a 500ms delay (to allow the animation to complete), hide the registration form and show the login form
        setTimeout(function() {
            registrationForm.style.display = 'none'; // Actually hide the registration form
            loginForm.style.display = 'block'; // Show the login form
            loginForm.classList.remove('hide-form'); // Remove the hide-form class to allow the login form to show
        }, 500);
    });

    // Event listener for the login link in the login form (navigates back to the registration form)
    document.querySelector('.loginForm small a').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action of the link (navigation)
        
        // Get the login and registration forms
        var loginForm = document.querySelector('.loginForm');
        var registrationForm = document.querySelector('.registration-form');
        
        // Add the 'hide-form' class to the registration form to start hiding it with animation
        registrationForm.classList.add('hide-form');
        
        // After a 500ms delay (to allow the animation to complete), hide the registration form and show the login form
        setTimeout(function() {
            registrationForm.style.display = 'none'; // Actually hide the registration form
            loginForm.style.display = 'block'; // Show the login form
            loginForm.classList.remove('hide-form'); // Remove the hide-form class to allow the login form to show
        }, 500);
    });
});
