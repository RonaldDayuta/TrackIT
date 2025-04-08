<?php
require_once '../dbconnection/conn.php'; // Include the database connection file

class Inventory {
    private $conn; // Private property to hold the database connection

    // Constructor to initialize the database connection
    public function __construct() {
        global $conn; // Use the global $conn variable to get the existing database connection
        $this->conn = $conn; // Assign the database connection to the instance property
    }

    // Method to save data into the tblinventory table
    public function saveData($user_id, $location, $item_code, $quantity) {
        // SQL query to insert data into the tblinventory table
        $sql = "INSERT INTO tblinventory (user_id, loc, item_id, qty, dateT) 
                VALUES (:user_id, :loc, :item_id, :qty, NOW())"; // NOW() inserts the current timestamp

        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);
        
        // Bind parameters to the prepared statement to prevent SQL injection
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);  // Bind user_id as a string
        $stmt->bindValue(':loc', $location, PDO::PARAM_STR);      // Bind location as a string
        $stmt->bindValue(':item_id', $item_code, PDO::PARAM_STR); // Bind item_code as a string
        $stmt->bindValue(':qty', $quantity, PDO::PARAM_INT);      // Bind quantity as an integer

        // Execute the statement and check if the data was inserted successfully
        if ($stmt->execute()) {
            return ["success" => true, "message" => "Data saved successfully!"]; // Return success message
        } else {
            // Return error message if the query execution fails, with details from errorInfo()
            return ["success" => false, "message" => "Error: " . implode(", ", $stmt->errorInfo())];
        }
    }
}
?>
