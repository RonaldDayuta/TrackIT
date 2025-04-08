<?php

// Include the User class to use its methods for user registration
require_once 'user.php';

// Set the content type of the response to JSON
header('Content-Type: application/json');

// Check if the request method is POST and required fields are present in the request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fname'], $_POST['user'], $_POST['pass'], $_POST['repass'])) {
    
    // Create an instance of the User class
    $user = new User();
    
    // Call the register method of the User class to register the user
    // Pass the form data (first name, username, password, and re-entered password) to the method
    $response = $user->register($_POST['fname'], $_POST['user'], $_POST['pass'], $_POST['repass']);
    
    // Return the response in JSON format
    echo json_encode($response);
} else {
    // If the request is not POST or required fields are missing, return an error message
    echo json_encode(['success' => false, 'message' => 'Invalid request or missing fields.']);
}

?>
