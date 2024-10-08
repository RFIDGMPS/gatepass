<?php
// Database connection parameters
$host = '127.0.0.1';
$username = 'u510162695_gatepassdb';
$password = '1Gatepassdb';
$database = 'u510162695_gatepassdb';

// Create a connection
$db = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($db->connect_error) {
    die('Connection failed: ' . htmlspecialchars($db->connect_error, ENT_QUOTES, 'UTF-8'));
}

// Set character set to UTF-8 to handle character encoding properly
$db->set_charset("utf8mb4");

// Optional: Enable prepared statement emulation for older MySQL versions (if necessary)
// $db->options(MYSQLI_OPT_LOCAL_INFILE, true);

// Optional: Set the connection to be more secure (e.g., disable SSL certificate verification)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Throw exceptions on error

// Use this connection in your other PHP scripts
?>
