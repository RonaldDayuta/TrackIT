<?php
// Start the session
session_start();

// Destroy the session to log out the user
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect the user to the login page
header("Location: ../system/index.php");
exit();
?>
