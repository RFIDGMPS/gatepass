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
                    <table class='table table-border' id='myTable'>
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
    echo "</table></div></form>";
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
            const photo = row.cells[0].getElementsByTagName('img')[0].src; // Assuming the first cell contains the photo
            const department = row.cells[1].innerText;
            const name = row.cells[2].innerText;

            // Output the retrieved data (you can handle it as needed)
            console.log("Photo:", photo);
            console.log("Department:", department);
            console.log("Name:", name);
            
            // Example of displaying the data in an alert
            alert(`Name: ${name}\nDepartment: ${department}\nPhoto: ${photo}`);
        }
    });
</script>
