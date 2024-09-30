<?php
date_default_timezone_set('Asia/Manila');
include 'connection.php';

// SQL query to select all records from personell_logs table

// SQL query to get MySQL time zones
$query = "SELECT @@global.time_zone as global_time_zone, @@session.time_zone as session_time_zone";

$result = $conn->query($query);

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
