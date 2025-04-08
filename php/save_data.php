<?php
// Include the Inventory class to use its methods for saving data
require_once 'inventory.php';

// Create an instance of the Inventory class
$inventory = new Inventory();

// Retrieve the POST data sent from the form or AJAX request
$user_id = $_POST['user_id'];        // User ID
$location = $_POST['location'];      // Location
$item_code = $_POST['item_code'];   // Item code
$quantity = $_POST['quantity'];     // Quantity of the item

// Call the saveData method of the Inventory class to insert the data into the database
$response = $inventory->saveData($user_id, $location, $item_code, $quantity);

// Set the response header to indicate the content type is JSON
header('Content-Type: application/json');

// Echo the response back to the client (in JSON format)
echo json_encode($response);
?>
