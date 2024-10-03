<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connection.php';

if (isset($_POST['send'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']); // Always sanitize inputs
    $data_uri = $_POST['capturedImage'];
    
    if (empty($data_uri)) {
        echo 'error: Captured image is missing.';
        exit();
    }

    $encodedData = str_replace(' ', '+', $data_uri);
    list($type, $encodedData) = explode(';', $encodedData);
    list(, $encodedData) = explode(',', $encodedData);
    $decodedData = base64_decode($encodedData);

    $imageName = uniqid() . '.jpeg';
    $filePath = 'admin/uploads/' . $imageName;
    $date_requested = date('Y-m-d H:i:s');
echo '<script>alert('.$imageName.');</script>';
    if (file_put_contents($filePath, $decodedData)) {
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";
        echo '<script>alert("passs1");</script>';
        if (mysqli_query($db, $query)) {
            echo '<script>alert("passs2");</script>';
            echo 'success';
        } else {
            echo '<script>alert("passs3");</script>';
            echo 'error: ' . mysqli_error($db) . ' - Query: ' . $query;
        }
    } else {
        echo '<script>alert("passs4");</script>';
        echo 'error: Failed to save the image.';
    }

    mysqli_close($db);
}
?>
