<?php
include 'connection.php';

// SQL query to select all records from personell_logs table
$sql = "    SELECT NOW() AS currentDate

";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Personnel ID</th>
                <th>Date Logged</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Location</th>
            </tr>";
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['currentDate']}</td>
                <td>{$row['date_logged']}</td>
                <td>{$row['time_in']}</td>
                <td>{$row['time_out']}</td>
                <td>{$row['location']}</td>
              </tr>";

        
    }
    echo "</table>";
} else {
    echo "0 results";
 
}

// Close the database connection
$db->close();
?>
