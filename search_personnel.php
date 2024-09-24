<?php
include 'connection.php';
include 'admin/header.php';

// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personell table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as a table
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Photo</th>
                <th>Department</th>
                <th>Name</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
               <td><img src='admin/uploads/" . $row['photo'] . "' width='50' height='50'></td>
                <td>" . $row['department'] . "</td>
                <td>" . $row['full_name'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

$db->close();
?>
