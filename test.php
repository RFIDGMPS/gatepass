<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include your database connection file
include 'connection.php';

// Check the database connection
$db->query("GRANT SELECT ON mysql.time_zone_name TO 'u510162695_gatepassdb'@'127.0.0.1'");
$db->query("FLUSH PRIVILEGES");


// Close the database connection
$db->close();
?>
