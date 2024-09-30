<?php
include 'connection.php';

// SQL query to select all records from personell_logs table
$sql = "    SELECT 
    p.photo,
    p.department,
    p.role,
    CONCAT(p.first_name, ' ', p.last_name) AS full_name,
    pl.time_in,
    pl.time_out,
    pl.date_logged
FROM personell_logs pl
JOIN personell p ON pl.personnel_id = p.id
WHERE pl.date_logged = CURRENT_DATE()

UNION

SELECT 
    photo,
    department,
    'Visitor' AS role,
    name AS full_name,
    time_in,
    time_out,
    date_logged
FROM visitor_logs 
WHERE date_logged = CURRENT_DATE()

ORDER BY 
    CASE 
        WHEN time_out IS NOT NULL THEN time_out 
        ELSE time_in 
    END DESC";
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
                <td>{$row['personnel_id']}</td>
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
