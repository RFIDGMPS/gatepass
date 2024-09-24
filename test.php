<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Design</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px;
        }
        .card {
            position: relative;
            width: 200px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            font-size: 18px;
            color: #fff;
            background: red;
            border: none;
            border-radius: 50%;
            padding: 5px 8px;
        }
    </style>
</head>
<body>

<div class="card-container">
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo1.jpg" alt="Photo">
        <h5 class="mt-2">John Doe</h5>
        <p>Department: HR</p>
    </div>
    <div class="card">
        <button class="close-btn" onclick="removeCard(this)">×</button>
        <img src="admin/uploads/photo2.jpg" alt="Photo">
        <h5 class="mt-2">Jane Smith</h5>
        <p>Department: IT</p>
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
