<?php
if (isset($_POST['send'])) {
    $id = $_POST['id'];
    $data_uri = $_POST['capturedImage'];
    $encodedData = str_replace(' ', '+', $data_uri);
    list($type, $encodedData) = explode(';', $encodedData);
    list(, $encodedData) = explode(',', $encodedData);
    $decodedData = base64_decode($encodedData);

    $imageName = uniqid() . '.jpeg';  // Use a unique ID for the image name to avoid overwriting files
    $filePath = 'admin/uploads/' . $imageName;

    $date_requested = date('Y-m-d H:i:s');

    if (file_put_contents($filePath, $decodedData)) {
        $query = "INSERT INTO lostcard (personnel_id, date_requested, verification_photo, status) 
                  VALUES ('$id', '$date_requested', '$imageName', 0)";
        mysqli_query($db, $query) or die('Error in updating Database');
        
       
}
}

?>