<?php
require_once '../dbconnection/conn.php'; // Include the database connection file

// Define the Inventory class to handle inventory-related operations
class Inventory {
    private $conn;  // Private variable to store the database connection

    // Constructor method to initialize the class with a database connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;  // Assign the passed database connection to the class member variable
    }

    // Method to fetch inventory record by ID
    public function getInventoryById($inventory_id) {
        // SQL query to fetch the inventory record based on the provided inventory_id
        $sql = "SELECT * FROM tblinventory WHERE inventory_id = :inventory_id LIMIT 1";
        
        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);
        
        // Bind the inventory_id parameter to the SQL query to prevent SQL injection
        $stmt->bindParam(":inventory_id", $inventory_id, PDO::PARAM_INT);

        // Execute the SQL query
        if ($stmt->execute()) {
            // Fetch the result as an associative array
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Check if a record was found
            if ($row) {
                // If a record is found, return a success response with the data
                return ["success" => true, "data" => $row];
            } else {
                // If no record is found, return a failure response
                return ["success" => false, "message" => "No record found."];
            }
        } else {
            // If the query execution fails, return an error message
            return ["success" => false, "message" => "Database error."];
        }
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $inventory_id = $_POST['id'];  // Retrieve the inventory_id from the POST data

    // Create an instance of the Inventory class and pass the database connection
    $inventory = new Inventory($conn);
    
    // Call the method to fetch the inventory by ID
    $response = $inventory->getInventoryById($inventory_id);
    
    // Return the response as a JSON object
    echo json_encode($response);
} else {
    // If the request method is not POST or 'id' is not provided, return an error message
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
