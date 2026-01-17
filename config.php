<?php
/**
 * Database Configuration File
 * This file contains MySQL database connection settings
 * Replace placeholder values with your actual database credentials
 */

// Database host - usually 'localhost' for local development
$db_host = 'localhost';

// Database username - replace with your MySQL username
$db_username = 'root';

// Database password - replace with your MySQL password (leave empty if no password)
$db_password = '';

// Database name - the name of your database
$db_name = 'ml_portal_db';

// Attempt to establish database connection using mysqli
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check if connection was successful
if (!$conn) {
    // If connection fails, display error message and stop execution
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set charset to UTF-8 to handle special characters properly
mysqli_set_charset($conn, "utf8");

// Connection successful message (can be removed in production)
// echo "Database connected successfully!";
?>
