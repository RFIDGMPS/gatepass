<?php
if (isset($_POST['send'])) {
  include 'connection.php';
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $data_uri = $_POST['capturedImage'];
    
    if (empty($data_uri)) {
        die('Captured image is missing.');
    }

    $encodedData = str_replace(' ', '+', $data_uri);
    list($type, $encodedData) = explode(';', $encodedData);
    list(, $encodedData) = explode(',', $encodedData);
    $decodedData = base64_decode($encodedData);

    $imageName = uniqid() . '.jpeg';  // Unique name to prevent overwriting
    $filePath = 'admin/uploads/' . $imageName;

    $date_requested = date('Y-m-d H:i:s');

    // Save the file
    if (file_put_contents($filePath, $decodedData)) {
        // Prepare the SQL query
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";
        
        // Execute the query and check for errors
        if (mysqli_query($db, $query)) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Your request has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'main.php';
                    });
                </script>";
        } else {
            echo "Error in saving data: " . mysqli_error($db);  // Show error from MySQL
        }
    } else {
        echo "Failed to save the image.";
    }
}
?>