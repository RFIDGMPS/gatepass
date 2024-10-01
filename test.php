<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prevent Page Reload with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form id="myForm">
    <label for="location">Location:</label>
    <select name="location" id="location">
        <option value="Gate">Gate</option>
        <!-- Add more options as needed -->
    </select>

    <label for="Ppassword">Password:</label>
    <input type="password" id="Ppassword" name="Ppassword" required>

    <label for="Prfid_number">RFID Number:</label>
    <input type="text" id="Prfid_number" name="Prfid_number" required>

    <button type="submit">Submit</button>
</form>

<div id="responseMessage"></div>

<script>
    $(document).ready(function(){
        $('#myForm').on('submit', function(event){
            event.preventDefault();  // Prevent form from reloading the page

            // Gather form data
            var formData = $(this).serialize();

            // Send form data via AJAX
            $.ajax({
                url: 'login.php',  // PHP file to handle the form submission
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Display the response message
                    $('#responseMessage').html(response);
                },
                error: function() {
                    $('#responseMessage').html("Error in form submission.");
                }
            });
        });
    });
</script>

</body>
</html>
