<?php
include 'connection.php';


// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personell table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, id, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as a table
if ($result->num_rows > 0) {
    echo "<form><div style='height:180px;' class='table-responsive'>
                    <table class='table table-border'>
            <tr>
                <th>Photo</th>
                <th>Department</th>
                <th>Name</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td><input type='checkbox' id='p".  $row['id'] . "' name='p".  $row['id'] . "' value='".  $row['full_name'] . "'>
  </td>
               <td><img src='admin/uploads/" . $row['photo'] . "' width='50' height='50'></td>
                <td>" . $row['department'] . "</td>
                <td>" . $row['full_name'] . "</td>
              </tr>";
    }
    echo "</table></div></form>";
} else {
    echo "No results found";
}

$db->close();
?>
