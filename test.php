<?php
include 'connection.php';

$sql = "
    SELECT * FROM visitor_logs
";

// Execute the query and check for errors
$result = $db->query($sql);

if (!$result) {
    // Display the error message from the query
    die("Query failed: " . $db->error);
}

if ($result && $result->num_rows > 0) {
    // Display results in an HTML table
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Date</th>
            <th>Department</th>
            <th>Time in</th>
            <th>Time out</th>
             <th>Role</th>
        </tr>";

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><img src='" . htmlspecialchars($row['photo']) . "' width='50' height='50'></td>
            <td>" . htmlspecialchars($row['rfid_number']) . "</td>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['date_logged']) . "</td>
               <td>" . htmlspecialchars($row['department']) . "</td>
            <td>" . htmlspecialchars($row['time_in']) . "</td>
            <td>" . htmlspecialchars($row['time_out']) . "</td>
         
            <td>" . htmlspecialchars($row['role']) . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>
