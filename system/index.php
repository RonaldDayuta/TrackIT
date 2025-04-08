<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Linking Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <title>TrackIT Collector ver.1.0</title>
    <!-- Favicon for the website -->
    <link rel="icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <!-- Main container for centering the login and registration forms -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            
            <!-- Left Box: Information and Logo Section -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #49abc9;">
                <!-- Logo Section -->
                <div class="featured-image mb-3">
                    <img src="../img/logo.png" class="logo" style="width: 50%; display: block; margin: 0 auto;">
                </div>
                <!-- App Information Text -->
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">TrackIT Collector ver.1.0</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">View and Buy our fashion trend clothing.</small>
            </div> 

            <!-- Right Box: Login Form Section -->
            <div class="loginForm col-md-6 right-box">
                <form action="php/login.php" method="POST" id="loginform">
                    <!-- Login Form Header -->
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Hello, User</h2>
                            <p>We are TrackIT Collector ver.1.0</p>
                        </div>
                    </div>
                    <!-- Username Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="username" name="username" placeholder="Username">
                    </div>
                    <!-- Password Input -->
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" placeholder="Password">
                        <span class="input-group-text bg-light">
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <!-- Remember Me & Forgot Password Section -->
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#" id="forgotPassword">Forgot Password?</a></small>
                        </div>
                    </div>
                    <!-- Login Button -->
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" id="login" type="submit">Login</button>
                    </div>
                    <!-- Google Sign In Button -->
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><img src="../img/g-logo.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                    </div>
                    <!-- Link to Registration Page -->
                    <div class="row">
                        <small>Don't have an account? <a href="#" id="showRegistrationForm">Sign Up</a></small>
                    </div>
                </form>
            </div> 

            <!-- Registration Form Section -->
            <div class="registration-form col-md-6 mx-auto mt-3" style="display:none;">
                <form action="php/signup.php" method="POST" id="signupForm">
                    <!-- Registration Form Header -->
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Create an Account</h2>
                            <p>Join on TrackIT Collector ver.1.0</p>
                        </div>
                    </div>
                    <!-- Full Name Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="fname" name="fname" placeholder="Full Name">
                    </div>
                    <!-- Username Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="user" name="user" placeholder="Username">
                    </div>
                    <!-- Password Input -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="pass" name="pass" placeholder="Password">
                        <span class="input-group-text bg-light">
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <!-- Confirm Password Input -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="repass" name="repass" placeholder="Confirm Password">
                        <span class="input-group-text bg-light">
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <!-- Sign Up Button -->
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit" id="submitForm">Sign Up</button>
                    </div>
                    <!-- Link to Login Page -->
                    <div class="row">
                        <small>Already have an account? <a href="#" id="showLoginForm">Log In</a></small>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</body>

<!-- Custom JavaScript for login and registration handling -->
<script src="../js/script.js" defer></script>
<script src="../js/login-register.js" defer></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- SweetAlert2 for popups and notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</html>
