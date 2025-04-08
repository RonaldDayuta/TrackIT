<?php

// Include the User class to access the login functionality
require_once 'user.php';


// Set the content type for the response to JSON
header('Content-Type: application/json');

// Check if the request method is POST and if both 'username' and 'password' are set in the request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    // Create a new User object
    $user = new User();

    // Call the login method of the User class and pass the username and password from the POST data
    $response = $user->login($_POST['username'], $_POST['password']);

    // Return the response from the login method as a JSON encoded string
    echo json_encode($response);
} else {
    // If the request is invalid or missing necessary parameters, return an error message
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
