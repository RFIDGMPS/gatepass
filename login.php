<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');

    // Example response for invalid password or RFID number
    if ($Prfid_number != '123456') {
        echo "RFID number not found.";
    } elseif ($password1 != 'gate123') {
        echo "Incorrect Password.";
    } else {
        echo "Login successful!";
    }
}
?>
