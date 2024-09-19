<?php
include 'connection.php';

$sql = "
    SELECT 
    p.*,  -- Selects all columns from the personell table
    pl.*  -- Selects all columns from the personell_logs table
FROM 
    personell_logs pl
JOIN 
    personell p 
ON 
    pl.personell_id = p.id
WHERE 
    pl.personell_id = 1;
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
            <th>Photo</th>
            <th>Department</th>
            <th>Role</th>
            <th>Full Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Date Logged</th>
        </tr>";

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><img src='" . htmlspecialchars($row['photo']) . "' width='50' height='50'></td>
            <td>" . htmlspecialchars($row['department']) . "</td>
            <td>" . htmlspecialchars($row['role']) . "</td>
            <td>" . htmlspecialchars($row['full_name']) . "</td>
            <td>" . htmlspecialchars($row['time_in']) . "</td>
            <td>" . htmlspecialchars($row['time_out']) . "</td>
            <td>" . htmlspecialchars($row['date_logged']) . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>
