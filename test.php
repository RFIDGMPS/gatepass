<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Card Design</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            display: flex;
            align-items: center; /* Center align items vertically */
            padding: 10px;
            margin: 10px 0; /* Space between cards */
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff; /* Card background color */
            position: relative; /* For absolute positioning of the button */
        }
        .card img {
            width: 60px; /* Size for the image */
            height: 60px; /* Size for the image */
            border-radius: 50%; /* Makes the image circular */
            margin-right: 15px; /* Space between image and text */
        }
        .card-content {
            flex: 1; /* Take up remaining space */
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            color: white;
            background: red;
            border: none;
            border-radius: 50%;
            padding: 5px 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo1.jpg" alt="Photo">
        <div class="card-content">
            <p class="mb-0"><strong>Department:</strong> HR</p>
            <h5 class="mb-0">John Doe</h5>
        </div>
    </div>
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo2.jpg" alt="Photo">
        <div class="card-content">
            <p class="mb-0"><strong>Department:</strong> IT</p>
            <h5 class="mb-0">Jane Smith</h5>
        </div>
    </div>
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo3.jpg" alt="Photo">
        <div class="card-content">
            <p class="mb-0"><strong>Department:</strong> Marketing</p>
            <h5 class="mb-0">Emily Johnson</h5>
        </div>
    </div>
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo4.jpg" alt="Photo">
        <div class="card-content">
            <p class="mb-0"><strong>Department:</strong> Finance</p>
            <h5 class="mb-0">Michael Brown</h5>
        </div>
    </div>
    <!-- Add more cards as needed -->
</div>

<script>
    function removeCard(button) {
        // Get the card element to remove
        const card = button.parentNode;
        // Remove the card from the DOM
        card.remove();
    }
</script>

</body>
</html>
