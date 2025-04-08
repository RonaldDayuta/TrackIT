<?php
// Define the Database class for handling database connection
class Database {
    private $host = 'localhost'; // Database host (localhost in this case)
    private $dbname = 'dbtrackit'; // The name of the database you are connecting to
    private $user = 'root'; // The username for the database connection
    private $pass = ''; // The password for the database connection (empty for localhost by default)
    private $conn; // Variable to hold the PDO connection object

    // Constructor to initialize the connection
    public function __construct() {
        try {
            // Create a new PDO instance to connect to the database
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
            
            // Set the error mode to exception to handle errors more effectively
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If there's an exception (connection failure), display an error message and stop execution
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Method to return the database connection
    public function connect() {
        return $this->conn; // Return the connection object
    }
}

// Create a new Database object and get the connection
$db = new Database(); // Instantiate the Database class
$conn = $db->connect(); // Get the connection object

// The connection is now available in $conn and can be used to query the database
?>
