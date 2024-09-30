<?php
// Set the time zone to your desired location
date_default_timezone_set('Asia/Manila'); // Replace with your preferred time zone

// Get the current date
echo date('Y-m-d H:i:s'); // Output the current date and time
include 'connection.php';

// SQL query to select all records from personell_logs table

$timeZoneQuery = "SET time_zone = 'Asia/Manila';";
if ($db->query($timeZoneQuery) === TRUE) {
    echo "Time zone set to Asia/Manila.";
} else {
    echo "Error setting time zone: " . $db->error;
}
$result = $db->query($query);

if ($result->num_rows > 0) {
    // Output the result
    while ($row = $result->fetch_assoc()) {
        echo "Global Time Zone: " . $row['global_time_zone'] . "<br>";
        echo "Session Time Zone: " . $row['session_time_zone'] . "<br>";
    }
} else {
    echo "No time zone information found.";
}
// Close the database connection
$db->close();
?>
