<?php
require_once '../dbconnection/conn.php'; // Ensure the path to database connection is correct

// Class to handle exporting inventory data to a text file
class InventoryExport {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db; // Store the database connection for later use
    }

    // Method to export data to a text file
    public function exportToTextFile() {
        // Set headers for file download
        header('Content-Type: text/plain'); // Set the content type to text file
        // Set the name of the file for download, it will be named "inventory_data.txt"
        header('Content-Disposition: attachment; filename="inventory_data.txt"');

        // SQL query to fetch data from the tblinventory table
        $sql = "SELECT user_id, loc, item_id, qty, dateT FROM tblinventory";
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement
        $stmt->execute(); // Execute the statement
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array

        // Check if there are results from the query
        if (count($result) > 0) {
            // Print header row with tab-separated column names
            // Use str_pad to ensure proper alignment of column headers
            echo str_pad("User ID", 15, " ") . str_pad("Location", 20, " ") . str_pad("Item Code", 15, " ") . str_pad("Quantity", 10, " ") . "Date Time\n";
            // Print a separator line to visually separate the header from the data
            echo str_repeat("-", 70) . "\n"; 

            // Loop through each row of the result and print the data
            // For each column in the row, use str_pad to align them properly
            foreach ($result as $row) {
                echo str_pad($row['user_id'], 15, " ") . str_pad($row['loc'], 20, " ") . str_pad($row['item_id'], 15, " ") . str_pad($row['qty'], 10, " ") . $row['dateT'] . "\n";
            }
        } else {
            // If no data was found, display a message
            echo "No data found!";
        }
    }
}

// Create a new instance of the Database class and get a connection
$db = new Database();
$conn = $db->connect(); // Get the existing database connection

// Create an instance of InventoryExport and pass the database connection to it
$inventoryExport = new InventoryExport($conn);
// Call the exportToTextFile method to export the data
$inventoryExport->exportToTextFile();
