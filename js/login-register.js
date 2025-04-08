$(function() {
    // Handle login form submission
    $("#loginform").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Retrieve input values for username and password
        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        // Check if both username and password fields are not empty
        if (username != "" && password != "") {
            // Make an AJAX request to login.php with username and password
            $.ajax({
                url: '../php/login.php', // PHP script to handle login
                type: 'POST', // Use POST method for sending data
                data: {
                    username: username,
                    password: password
                },
                dataType: 'json', // Expect JSON response from server
                success: function(response) {
                    console.log('Login response:', response); // Log the server response for debugging

                    // If login is successful, show success message and redirect
                    if (response.success) {
                        Swal.fire({
                            title: 'Successful',
                            text: response.message, // Display message from server
                            icon: 'success',
                        }).then(function() {
                            // Redirect to homepage after successful login
                            window.location.href = 'home.php';
                        });
                        $('#loginform')[0].reset(); // Reset login form after submission
                    } else {
                        // Show error message if login fails
                        Swal.fire({
                            title: 'Errors',
                            text: response.message,
                            icon: 'error',
                        });
                        $('#loginform')[0].reset(); // Reset login form on failure
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX request failed:', textStatus, errorThrown); // Log any errors
                    // Show error message if AJAX request fails
                    Swal.fire({
                        title: 'Errors',
                        text: 'An error occurred during the login process.',
                        icon: 'error',
                    });
                }
            });
        } else {
            // If fields are empty, prompt the user to fill them in
            alert("Please enter both username and password.");
        }
    });

    // Handle signup form submission
    $("#signupForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Retrieve input values for the signup form
        var fullName = $("#fname").val().trim();
        var user = $("#user").val().trim();
        var pass = $("#pass").val().trim();
        var repass = $("#repass").val().trim();

        // Validate that all required fields are filled
        if (fullName === "" || user === "" || pass === "" || repass === "") {
            Swal.fire({
                title: "Error",
                text: "Please fill in all required fields.",
                icon: "error",
            });
            return; // Stop the form submission if any field is empty
        }

        // Validate that the password and confirm password fields match
        if (pass !== repass) {
            Swal.fire({
                title: "Error",
                text: "Password and confirm password do not match.",
                icon: "error",
            });
            return; // Stop the form submission if passwords don't match
        }

        // Perform AJAX request for user signup
        $.ajax({
            url: "../php/signup.php", // PHP script to handle signup
            type: "POST", // Use POST method for sending data
            data: {
                fname: fullName,
                user: user,
                pass: pass,
                repass: repass,
            },
            dataType: "json", // Expect JSON response from server
            success: function(response) {
                console.log("Signup response:", response); // Log the server response for debugging

                // If signup is successful, show success message
                if (response.success) {
                    Swal.fire({
                        title: "Success",
                        text: response.message, // Display success message from server
                        icon: "success",
                    });
                    $("#signupForm")[0].reset(); // Reset the signup form
                } else {
                    // If signup fails, show error message
                    Swal.fire({
                        title: "Error",
                        text: response.message, // Display error message from server
                        icon: "error",
                    });
                    $("#signupForm")[0].reset(); // Reset the signup form
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed:", textStatus, errorThrown); // Log any errors
                // Show error message if AJAX request fails
                Swal.fire({
                    title: "Error",
                    text: "An error occurred during the signup process.",
                    icon: "error",
                });
            },
        });
    });
});

document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.classList.replace("bi-eye-slash", "bi-eye");
    } else {
        passwordInput.type = "password";
        this.classList.replace("bi-eye", "bi-eye-slash");
    }
});

document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("pass");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.classList.replace("bi-eye-slash", "bi-eye");
    } else {
        passwordInput.type = "password";
        this.classList.replace("bi-eye", "bi-eye-slash");
    }
});

document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("repass");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.classList.replace("bi-eye-slash", "bi-eye");
    } else {
        passwordInput.type = "password";
        this.classList.replace("bi-eye", "bi-eye-slash");
    }
});