<?php
// Include the database connection file
require_once '../dbconnection/conn.php';

// Define the Inventory class to handle database operations
class Inventory {
    private $conn;

    // Constructor to initialize the connection
    public function __construct($db) {
        $this->conn = $db; // Store the database connection object
    }

    // Method to fetch all inventory data
    public function fetchAllData() {
        // SQL query to select data from the tblinventory table
        $sql = "SELECT inventory_id, user_id, loc, item_id, qty, dateT FROM tblinventory";
        
        // Prepare and execute the SQL statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        // Fetch all results as an associative array and return them
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Initialize the Inventory class with the database connection
$inventory = new Inventory($conn);

// Fetch all data from the inventory
$data = $inventory->fetchAllData();

// Set the header to indicate that the output is JSON
header('Content-Type: application/json');

// Output the data in JSON format
echo json_encode($data);
?>
