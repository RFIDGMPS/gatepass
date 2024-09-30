<?php

include 'connection.php';

// SQL query to select all records from personell_logs table
// Set the session time zone to Asia/Manila
$timeZoneQuery = "SET time_zone = '+08:00';"; // Alternatively, use 'Asia/Manila'
if ($db->query($timeZoneQuery) === TRUE) {
    echo "MySQL time zone set to Asia/Manila.";
} else {
    echo "Error setting MySQL time zone: " . $db->error;
}

// Display the current time using MySQL's CURRENT_TIMESTAMP function
$result = $db->query("SELECT CURRENT_TIMESTAMP as current_time");
$row = $result->fetch_assoc();
echo "MySQL Current Time: " . $row['current_time'];


// Close the database connection
$db->close();
?>
