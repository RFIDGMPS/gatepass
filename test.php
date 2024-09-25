<?php
include 'connection.php';

// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personnel table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, id, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as a table
if ($result->num_rows > 0) {
    echo "<form><div style='height:180px;' class='table-responsive'>
            <table class='table table-border' id='myTable'>
                <tr>
                    <th>Photo</th>
                    <th>Department</th>
                    <th>Name</th>
                </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick='showDetails(" . htmlspecialchars($row['id']) . ", \"" . htmlspecialchars($row['full_name']) . "\", \"" . htmlspecialchars($row['department']) . "\", \"" . htmlspecialchars($row['photo']) . "\")'>
                <td><img src='admin/uploads/" . htmlspecialchars($row['photo']) . "' width='50' height='50'></td>
                <td>" . htmlspecialchars($row['department']) . "</td>
                <td>" . htmlspecialchars($row['full_name']) . "</td>
              </tr>";
    }
    echo "</table></div></form>";
} else {
    echo "No results found";
}

$db->close();
?>

<!-- Modal for displaying details -->
<div id="detailsModal" style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); background-color:white; padding:20px; border:1px solid #ccc; z-index:1000;">
    <h3 id="modalTitle"></h3>
    <img id="modalPhoto" src="" width="100" height="100" alt="Photo">
    <p><strong>Department:</strong> <span id="modalDepartment"></span></p>
    <button onclick="closeModal()">Close</button>
</div>

<script>
function showDetails(id, fullName, department, photo) {
    document.getElementById('modalTitle').innerText = fullName;
    document.getElementById('modalDepartment').innerText = department;
    document.getElementById('modalPhoto').src = 'admin/uploads/' + photo;
    
    // Show the modal
    document.getElementById('detailsModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('detailsModal').style.display = 'none';
}
</script>
