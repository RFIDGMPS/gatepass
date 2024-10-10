<?php
include 'connection.php';
// Step 2: Query to fetch data from the `personell_logs` table
$sql = "SELECT * FROM personell_logs";
$result = $db->query($sql);

$sql = "ALTER TABLE personell_logs 
        ADD COLUMN time_in_am VARCHAR(255) NOT NULL,
        ADD COLUMN time_out_am VARCHAR(255) NOT NULL,
        ADD COLUMN time_in_pm VARCHAR(255) NOT NULL,
        ADD COLUMN time_out_pm VARCHAR(255) NOT NULL;";

// Execute query
if ($db->query($sql) === TRUE) {
    echo "Columns added successfully!";
} else {
    echo "Error adding columns: " . $db->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personell Logs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Personell Logs</h2>

<?php
// Step 3: Display the table if data exists
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Personnel ID</th>
            <th>Date Logged</th>
            <th>Time In AM</th>
            <th>Time Out AM</th>
            <th>Time In PM</th>
            <th>Time Out PM</th>
            <th>Location</th>
          </tr>";
    
    // Fetch and display each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['personell_id']}</td>
                <td>{$row['date_logged']}</td>
                <td>{$row['time_in_am']}</td>
                <td>{$row['time_out_am']}</td>
                <td>{$row['time_in_pm']}</td>
                <td>{$row['time_out_pm']}</td>
                <td>{$row['location']}</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
$db->close();
?>

</body>
</html>
