<?php
include 'connection.php';


// Set the time zone to Asia/Manila
$db->query("SET time_zone = 'Asia/Manila'");

// Fetch current date from MySQL
$result = $db->query("SELECT CURRENT_DATE() as current_date");

// Check if query was successful
if (!$result) {
    die("Query failed: " . $db->error);
}

// Fetch the current date
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mysql_current_date = $row['current_date'];
    $php_current_date = date('Y-m-d'); // Current date in PHP

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

$db->close();
?>
