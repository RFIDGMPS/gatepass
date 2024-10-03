<?php
// Check if form has been submitted
if (isset($_POST['send'])) {
    // Ensure the database connection is established
  include 'connection.php';

  // Get the ID from the hidden input
$id = $_POST['id'];

// Handle the uploaded photo
$data_uri = $_POST['capturedImage'];

// Ensure the data URI format is correct
if (preg_match('/^data:image\/(?<type>.+);base64,(?<data>.+)$/', $data_uri, $matches)) {
    $encodedData = $matches['data'];
    $decodedData = base64_decode($encodedData);
} else {
    die('Invalid data URI format');
}

// Create a unique name for the image to avoid overwriting files
$imageName = uniqid() . '.jpeg';
$filePath = 'uploads/' . $imageName;

// Get the current date and time
$date_requested = date('Y-m-d H:i:s');

// Check if the directory exists and is writable
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true); // Create the directory if it doesn't exist
}

// Attempt to save the image and insert into the database
if (file_put_contents($filePath, $decodedData) !== false) {
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $db->prepare("INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) VALUES (?, ?, ?, ?)");
    $status = 0; // Set the status
    $stmt->bind_param('issi', $id, $date_requested, $imageName, $status);
    
    // Execute the query and check for success
    if ($stmt->execute()) {
        // Alert and redirect (you can replace this with your redirection logic)
        echo "success";
        // header('Location: your_redirect_url.php'); // Uncomment for redirection
    } else {
        die('Error in updating Database: ' . $stmt->error);
    }
    
    // Close the statement
    $stmt->close();
} else {
    die('Error saving the image.');
}

    
}
?>
