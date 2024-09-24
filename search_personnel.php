<?php
include 'connection.php';

// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personnel table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as a table
if ($result->num_rows > 0) {
    echo "<div style='height:180px;' class='table-responsive'>
            <table class='table table-border'>
                <tr>
                    <th>Photo</th>
                    <th>Department</th>
                    <th>Name</th>
                </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"displayData('" . htmlspecialchars($row['photo']) . "', '" . htmlspecialchars($row['department']) . "', '" . htmlspecialchars($row['full_name']) . "')\">
                <td><img src='admin/uploads/" . htmlspecialchars($row['photo']) . "' width='50' height='50'></td>
                <td>" . htmlspecialchars($row['department']) . "</td>
                <td>" . htmlspecialchars($row['full_name']) . "</td>
              </tr>";
    }
    echo "</table></div>";
} else {
    echo "No results found";
}

$db->close();
?>

<!-- Modal for displaying personnel details -->
<div id="detailModal" style="display:none; position:fixed; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7);">
    <div style="background-color:white; margin: 15% auto; padding: 20px; width: 300px;">
        <span id="closeModal" style="cursor:pointer; float:right;">&times;</span>
        <h3>Personnel Details</h3>
        <img id="modalPhoto" src="" width="100" height="100" alt="Personnel Photo">
        <p><strong>Department:</strong> <span id="modalDepartment"></span></p>
        <p><strong>Name:</strong> <span id="modalName"></span></p>
    </div>
</div>

<script>
    function displayData(photo, department, fullName) {
        // Set the values in the modal
        document.getElementById('modalPhoto').src = 'admin/uploads/' + photo;
        document.getElementById('modalDepartment').innerText = department;
        document.getElementById('modalName').innerText = fullName;

        // Show the modal
        document.getElementById('detailModal').style.display = 'block';
    }

    // Close the modal when the close button is clicked
    document.getElementById('closeModal').onclick = function() {
        document.getElementById('detailModal').style.display = 'none';
    }

    // Close the modal when clicking outside of the modal content
    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
