<?php
include 'connection.php';

// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personell table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as dropdown options
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row['full_name']) . "' data-department='" . htmlspecialchars($row['department']) . "' data-photo='" . htmlspecialchars($row['photo']) . "'>" . htmlspecialchars($row['full_name']) . "</option>";
    }
} else {
    echo "<option value=''>No results found</option>";
}

$db->close();
?>
