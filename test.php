<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'connection.php';

// Check the database connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Set the time zone to Asia/Manila
$db->query("SET time_zone = 'Asia/Manila'");

// Fetch the current date from MySQL
$result = $db->query("SELECT CURRENT_DATE() as current_date");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $db->error);
}

// Fetch and display the current date
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mysql_current_date = $row['current_date'];  // Current date from MySQL
    $php_current_date = date('Y-m-d');            // Current date in PHP

    // Output the dates for comparison
    echo "MySQL Current Date: " . $mysql_current_date . "<br>";
    echo "PHP Current Date: " . $php_current_date . "<br>";

    // Compare the dates
    if ($mysql_current_date === $php_current_date) {
        echo "The dates are the same.";
    } else {
        echo "The dates are different.";
    }
} else {
    echo "No rows found.";
}

// Close the database connection
$db->close();
?>
