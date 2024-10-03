<?php
// Check if form has been submitted
if (isset($_POST['send'])) {
    // Ensure the database connection is established
  include 'connection.php';

    // Sanitize the input fields to prevent SQL injection
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $data_uri = $_POST['capturedImage'];
    
    // Check if the captured image is provided
    if (empty($data_uri)) {
        echo 'error: Captured image is missing.';
        exit();
    }

    // Decode the base64 encoded image
    $encodedData = str_replace(' ', '+', $data_uri);
    list($type, $encodedData) = explode(';', $encodedData);
    list(, $encodedData) = explode(',', $encodedData);
    $decodedData = base64_decode($encodedData);

    // Generate a unique name for the image
    $imageName = uniqid() . '.jpeg';
    $filePath = 'admin/uploads/' . $imageName;

    // Get the current date and time
    $date_requested = date('Y-m-d H:i:s');

    // Save the decoded image to the server
    if (file_put_contents($filePath, $decodedData)) {
        // Prepare the SQL query to insert data into the database
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";
        
        // Execute the query
        if (mysqli_query($db, $query)) {
            // Return a success message
            echo 'success';
        } else {
            // Return a MySQL error message
            echo 'error: ' . mysqli_error($db);
        }
    } else {
        // Return an error if the image couldn't be saved
        echo 'error: Failed to save the image.';
    }

    
}
?>
