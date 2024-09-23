<?php
include 'connection.php';


$sql = "CREATE TABLE IF NOT EXISTS `lost_found` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `sender` varchar(255) NOT NULL,
    `status` int(11) NOT NULL,
    `department` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `date` datetime NOT NULL,
    PRIMARY KEY (`id`)
  )";
  
  // Execute the query
  if (mysqli_query($db, $sql)) {
      echo "Table `lost_found` created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($db);
  }
$sql = "
    SELECT * FROM lost_found
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
            <th>Sender</th>
            <th>Status</th>
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
            <td>" . htmlspecialchars($row['sender']) . "</td>
            <td>" . htmlspecialchars($row['status']) . "</td>
            <td>" . htmlspecialchars($row['department']) . "</td>
               <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['date']) . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
?>
