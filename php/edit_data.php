<?php
require_once '../dbconnection/conn.php'; // Include the database connection file

class InventoryUpdate {
    private $conn; // Database connection property

    // Constructor to initialize the database connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection; // Assign the database connection
    }

    // Method to update inventory details
    public function updateInventory($inventory_id, $user_id, $loc, $item_id, $qty, $dateT = null) {
        // Set the desired timezone (Manila timezone in this case)
        $timezone = new DateTimeZone('Asia/Manila'); 
        $date = new DateTime(); // Create a new DateTime object for current date and time
        $date->setTimezone($timezone); // Set the timezone

        // If no date is provided, use the current timestamp
        if (is_null($dateT)) {
            $dateT = $date->format('Y-m-d H:i:s'); // Set the date to current timestamp in 'YYYY-MM-DD HH:MM:SS' format
        }

        // SQL query to update inventory details based on inventory_id
        $sql = "UPDATE tblinventory SET user_id = :user_id, loc = :loc, item_id = :item_id, qty = :qty, dateT = :dateT WHERE inventory_id = :inventory_id";
        $stmt = $this->conn->prepare($sql); // Prepare the SQL statement

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR); // Bind user_id parameter
        $stmt->bindParam(":loc", $loc, PDO::PARAM_STR); // Bind loc parameter
        $stmt->bindParam(":item_id", $item_id, PDO::PARAM_STR); // Bind item_id parameter
        $stmt->bindParam(":qty", $qty, PDO::PARAM_STR); // Bind qty parameter
        $stmt->bindParam(":dateT", $dateT, PDO::PARAM_STR); // Bind dateT parameter
        $stmt->bindParam(":inventory_id", $inventory_id, PDO::PARAM_INT); // Bind inventory_id parameter

        // Execute the SQL statement and return a success or error message
        if ($stmt->execute()) {
            return ["success" => true, "message" => "Record updated successfully!"];
        } else {
            return ["success" => false, "message" => "Error updating record."];
        }
    }
}

// Check if the request method is POST and the required data is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inventory_id'])) {
    // Retrieve POST data for inventory update
    $inventory_id = $_POST['inventory_id'];
    $user_id = $_POST['user_id'];
    $loc = $_POST['loc'];
    $item_id = $_POST['item_id'];
    $qty = $_POST['qty'];
    $dateT = isset($_POST['dateT']) ? $_POST['dateT'] : null; // Use provided dateT or null if not provided

    // Create an instance of the InventoryUpdate class and call the updateInventory method
    $inventoryUpdate = new InventoryUpdate($conn);
    $response = $inventoryUpdate->updateInventory($inventory_id, $user_id, $loc, $item_id, $qty, $dateT);
    
    // Return the response as JSON
    echo json_encode($response);
} else {
    // Return an error response if the request is invalid
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
