<?php

include 'connection.php';


// Display the current time using MySQL's CURRENT_TIMESTAMP function
$result = $db->query("SELECT CURRENT_DATE() as current_time");
$row = $result->fetch_assoc();
echo "MySQL Current Time: " . $row['current_time'];


// Close the database connection
$db->close();
?>
