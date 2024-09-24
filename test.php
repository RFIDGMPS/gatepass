<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
    <!-- You may add your CSS links here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add any additional custom styles here */
        .chatbot {
            display: none; /* Hide initially, toggle with JavaScript */
        }
    </style>
</head>
<body>
<table id="myTable">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Department</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="admin/uploads/photo1.jpg" width="50" height="50"></td>
            <td>HR</td>
            <td>John Doe</td>
        </tr>
        <tr>
            <td><img src="admin/uploads/photo2.jpg" width="50" height="50"></td>
            <td>IT</td>
            <td>Jane Smith</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>


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


</body>
</html>
