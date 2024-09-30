<?php

include 'connection.php';


// Display the current time using MySQL's CURRENT_TIMESTAMP function

$result = $db->query("SELECT CURRENT_DATE() as current_time");

// Check if query was successful
if (!$result) {
    die("Query failed: " . $db->error);
}

// Check if any rows are returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "MySQL Current Time: " . $row['current_time'];
} else {
    echo "No rows found.";
}



// Close the database connection
$db->close();
?>
