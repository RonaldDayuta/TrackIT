<?php
// Include the database connection file to ensure the database connection is available
require_once '../dbconnection/conn.php'; // Ensure path is correct

// Define the Inventory class to handle database operations related to inventory
class Inventory {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db; // Store the database connection object
    }

    // Method to delete an item from the inventory based on the provided ID
    public function deleteItem($id) {
        // SQL query to delete the inventory item by its ID
        $sql = "DELETE FROM tblinventory WHERE inventory_id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement

        if ($stmt) {
            // Bind the ID parameter to the prepared statement
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Execute the statement and check if it is successful
            if ($stmt->execute()) {
                // Return success response if record is deleted
                return ["success" => true, "message" => "Record deleted successfully!"];
            } else {
                // Return error response if there is an issue with execution
                return ["success" => false, "message" => "Error deleting record: " . implode(", ", $stmt->errorInfo())];
            }
        }
        // Return error response if statement preparation failed
        return ["success" => false, "message" => "Failed to prepare statement"];
    }
}

// Check if the request method is POST and if the 'id' parameter is set in the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Create an instance of the Inventory class
    $inventory = new Inventory($conn);

    // Call the deleteItem method and pass the 'id' parameter from the POST request
    $response = $inventory->deleteItem($_POST['id']);
} else {
    // If request method is not POST or 'id' parameter is missing, return an invalid request response
    $response = ["success" => false, "message" => "Invalid request"];
}

// Set the content type to JSON for the response
header('Content-Type: application/json');

// Encode the response array as a JSON string and output it
echo json_encode($response);
?>
