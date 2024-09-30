<?php
include 'connection.php';

// Display the current date using MySQL's CURRENT_DATE function
$result = $db->query("SELECT CURRENT_DATE() as current_time");

// Check if query was successful
if (!$result) {
    die("Query failed: " . $db->error);
}

// Check if any rows are returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "MySQL Current Date: " . $row['current_time'];
} else {
    echo "No rows found.";
}

// Close the database connection
$db->close();
?>
