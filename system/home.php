<?php
// Prevent caching by browsers for this page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); // Date in the past
?>


<?php
// Start the session to access session variables
session_start();

// Check if the session variable for the username is set
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the session is not set
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information about the page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackIT Collector ver.1.0</title> <!-- Page title -->

    <!-- Linking to Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Linking to jQuery library for handling DOM manipulations and AJAX requests -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Linking to Bootstrap JS for interactive components like modals, dropdowns, etc. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- 🔥 Navbar with Burger Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand name or logo -->
        <a class="navbar-brand" href="#">TrackIT Collector ver.1.0</a>

        <!-- Burger Menu Button (visible on mobile devices) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span> <!-- Burger icon -->
        </button>

        <!-- Collapsible Menu for the navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Collect Data Link -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="collect_data.php" id="collectData">Collect Data</a>
                </li>
                <!-- Review Data Link -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="review_data.php" id="reviewData">Review Data</a>
                </li>
                <!-- Export Data Link -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="export_data.php" id="exportData">Export Data</a>
                </li>
            </ul>
            <!-- Logout Button -->
            <a href="../php/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<!-- 🔥 Content Area -->
<div class="container mt-4">
    <!-- Heading for the page content -->
    <h3>Welcome to Data Collector Program of TrackIT Collector ver.1.0</h3>
    <!-- This div will be populated dynamically with the Collect Data form or other content -->
    <div id="content"></div>
</div>

<!-- External JS file to handle page-specific scripts (e.g., load form, handle AJAX, etc.) -->
<script src="../js/home.js"></script>

</body>
</html>
