<?php
include 'connection.php';

$response = ['status' => 'error', 'message' => 'An unexpected error occurred.'];

if (isset($_POST['send'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $data_uri = $_POST['capturedImage'];

    if (empty($data_uri)) {
        $response['message'] = 'Captured image is missing.';
        echo json_encode($response);
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
            $response['status'] = 'success';
            $response['message'] = 'Your work has been saved.';
        } else {
            $response['message'] = 'Database error: ' . mysqli_error($db);
        }
    } else {
        $response['message'] = 'Failed to save the image.';
    }
}

echo json_encode($response);
?>
