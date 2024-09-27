<?php
include 'connection.php'; // Include your database connection

// Query to select all records from the lostcard table
$query = "SELECT * FROM lostcard";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($db));
}

// HTML structure to display the data
echo '<h2>Lost Card Records</h2>';
echo '<table border="1" cellpadding="10" cellspacing="0">';
echo '<tr>
        <th>ID</th>
        <th>Personnel ID</th>
        <th>Date Requested</th>
        <th>Status</th>
        <th>Verification Photo</th>
      </tr>';

// Fetching and displaying each row
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['personnel_id'] . '</td>';
    echo '<td>' . $row['date_requested'] . '</td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td><img src="admin/uploads/' . $row['verification_photo'] . '" alt="Verification Photo" style="height: 50px; width: 50px;"></td>';
    echo '</tr>';
}

echo '</table>';

// Free the result set and close the database connection
mysqli_free_result($result);
mysqli_close($db);
?>
