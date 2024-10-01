<?php
// Include your database connection file
include 'connection.php';

// Check the database connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Run the query to get time zones
$result = $db->query("SELECT * FROM mysql.time_zone_name");

// Check if the query was successful
if ($result) {
    // Loop through the results and display them
    while ($row = $result->fetch_assoc()) {
        echo $row['Time_zone_name'] . "<br>";
    }
} else {
    echo "Query failed: " . $db->error;
}

// Close the database connection
$db->close();
?>
