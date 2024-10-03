<?php
include 'connection.php';

if (isset($_POST['send'])) {
 
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $data_uri = $_POST['capturedImage'];
    echo  $data_uri;
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

    if (file_put_contents($filePath, $decodedData)) {
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";
        
        if (mysqli_query($db, $query)) {
            echo 'success';
        } else {
            echo 'success';
            echo 'error: ' . mysqli_error($db) . ' - Query: ' . $query;
        }
    } else {
        echo 'error: Failed to save the image.';
    }

    mysqli_close($db);
}
?>
