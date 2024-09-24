<!-- search_personnel.php -->
<?php
include 'connection.php';

// Get the search query from URL
$q = isset($_GET['q']) ? $db->real_escape_string($_GET['q']) : '';

// SQL query to search in the personell table
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, department, photo 
        FROM personell 
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%$q%'";

$result = $db->query($sql);

// Output results as a table
if ($result->num_rows > 0) {
    echo "<div style='height:180px;' class='table-responsive'>
            <table id='myTable' class='table table-border'>
                <tr>
                    <th>Photo</th>
                    <th>Department</th>
                    <th>Name</th>
                </tr>";
    while ($row = $result->fetch_assoc()) {
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
<script>
    // Get the table element
    const table = document.getElementById("myTable");

    // Add a click event listener to the table
    table.addEventListener("click", function(event) {
        // Check if a cell (td) was clicked
        if (event.target.tagName === "TD") {
            // Get the row that contains the clicked cell
            const row = event.target.parentNode;
            
            // Retrieve the data from the cells
            const photo = row.cells[0].getElementsByTagName('img')[0].src.split('/').pop(); // Get the filename
            const department = row.cells[1].innerText;
            const name = row.cells[2].innerText;

            // Update the card with selected personnel's data
            document.getElementById("selectedDepartment").textContent = department;
            document.getElementById("selectedName").textContent = name;
            document.getElementById("selectedPhoto").src = 'admin/uploads/' + photo; // Adjust path if needed
            document.getElementById("selectedPersonelTable").style.display = 'block'; // Show the card
        }
    });
</script>
