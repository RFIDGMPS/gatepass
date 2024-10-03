<?php
if (isset($_POST['send'])) {
    // Retrieve data from the form
    $id = $_POST['id'];
    $data_uri = $_POST['capturedImage'];

    // Decode the base64 image string
    $encodedData = str_replace(' ', '+', $data_uri);
    list($type, $encodedData) = explode(';', $encodedData);
    list(, $encodedData) = explode(',', $encodedData);
    $decodedData = base64_decode($encodedData);

    // Generate a unique name for the image and save the file
    $imageName = uniqid() . '.jpeg';
    $filePath = 'admin/uploads/' . $imageName;

    // Save the image to the file system
    if (file_put_contents($filePath, $decodedData)) {
        // Current date and time
        $date_requested = date('Y-m-d H:i:s');

        // SQL query to insert the record into the lostcard table
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";

        // Execute the query
        if (mysqli_query($db, $query)) {
            // Success response for JavaScript
            echo "success";
        } else {
            // Error in inserting data
            echo "Error: " . mysqli_error($db);
        }
    } else {
        // Error in saving the image
        echo "Failed to save image.";
    }
} else {
    // Invalid access to this script
    echo "Invalid request.";
}
?>