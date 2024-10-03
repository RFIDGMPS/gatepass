<?php

include 'connection.php';
// SQL query to select records from the lostcard table
$query = "SELECT personnel_id, date_requested, verification_photo, status FROM lostcard";
$result = $db->query($query);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>
            <tr>
                <th>Personnel ID</th>
                <th>Date Requested</th>
                <th>Verification Photo</th>
                <th>Status</th>
            </tr>";

    // Fetch and display each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['personnel_id']) . "</td>
                <td>" . htmlspecialchars($row['date_requested']) . "</td>
                <td><img src='uploads/" . htmlspecialchars($row['verification_photo']) . "' alt='Verification Photo' style='width:100px; height:auto;'></td>
                <td>" . htmlspecialchars($row['status']) . "</td>
              </tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "No records found.";
}
?>