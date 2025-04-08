<?php

// Include the database connection
require_once '../dbconnection/conn.php';

class User {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        global $conn; // Get the existing connection from conn.php
        $this->conn = $conn;
    }

    // User login method
    public function login($username, $password) {
        // Default response
        $response = ['success' => false, 'message' => ''];

        // Check if username and password are not empty
        if (!empty($username) && !empty($password)) {
            try {
                // Prepare a SQL statement to select the user based on the username
                $stmt = $this->conn->prepare("SELECT * FROM tblaccounts WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                // Fetch the user data from the database
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Check if user exists and if the password is correct
                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        // Start a session and store the username
                        session_start();
                        $_SESSION['username'] = $username;
                        $response['success'] = true;
                        $response['message'] = 'Login successful';
                    } else {
                        // Password is incorrect
                        $response['message'] = 'Incorrect Password';
                    }
                } else {
                    // Username is incorrect
                    $response['message'] = 'Incorrect Username';
                }
            } catch (PDOException $e) {
                // Handle database errors
                $response['message'] = 'Database Error: ' . $e->getMessage();
            }
        } else {
            // If username or password is empty
            $response['message'] = 'Both username and password are required';
        }

        return $response;
    }

    // User registration method
    public function register($fullName, $username, $password, $repass) {
        // Default response
        $response = ['success' => false, 'message' => ''];

        // Check if all fields are not empty
        if (!empty($fullName) && !empty($username) && !empty($password) && !empty($repass)) {
            // Check if the passwords match
            if ($password !== $repass) {
                $response['message'] = 'Passwords do not match.';
                return $response;
            }

            try {
                // Hash the password for secure storage
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Prepare a SQL statement to insert the user data into the database
                $stmt = $this->conn->prepare("INSERT INTO tblaccounts (full_name, username, password) VALUES (:full_name, :username, :password)");
                $stmt->bindParam(':full_name', $fullName);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);

                // Execute the SQL statement and check if the data was inserted
                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['message'] = 'Registration successful!';
                } else {
                    // Error inserting data into the database
                    $response['message'] = 'Error inserting data into database.';
                }
            } catch (PDOException $e) {
                // Handle database errors
                $response['message'] = 'Database Error: ' . $e->getMessage();
            }
        } else {
            // If any of the fields are empty
            $response['message'] = 'All fields are required.';
        }

        return $response;
    }
}

?>
