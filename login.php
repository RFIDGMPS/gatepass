<?php
session_start();
include 'connection.php';  // Ensure this file contains the DB connection logic

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');
    
    // Validate inputs (you may customize this based on your application's requirements)
    if (empty($location) || empty($password1) || empty($Prfid_number)) {
        echo "All fields are required.";
        exit();
    }

    // Check if user is security personnel at the gate
    $sql1 = "SELECT * FROM personell WHERE rfid_number = ?";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bind_param("s", $Prfid_number);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($location === "Gate") {
        if ($result1 && $result1->num_rows > 0) {
            $personell = $result1->fetch_assoc();
            
            if ($password1 === "gate123") {
                if ($personell['role'] === 'Security Personnel' && $personell['status'] === 'Active') {
                    // Successful login
                    $_SESSION['location'] = 'Main Gate';
                    $_SESSION['department'] = 'main';
                    echo 'success';  // Send 'success' response
                    exit();
                } else {
                    echo "You're not allowed to open the Main Gate.";
                }
            } else {
                echo "Incorrect Password.";
            }
        } else {
            echo "RFID number not found.";
        }
    }

    // Additional logic for room login
    $sql2 = "SELECT * FROM rooms WHERE room = ?";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bind_param("s", $location);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        $room = $result2->fetch_assoc();
        $sql3 = "SELECT * FROM personell WHERE rfid_number = ? AND department = ?";
        $stmt3 = $db->prepare($sql3);
        $stmt3->bind_param("ss", $Prfid_number, $room['department']);
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        if ($result3->num_rows > 0) {
            $instructor = $result3->fetch_assoc();
            if (password_verify($password1, $room['password'])) {
                if ($instructor['department'] == $room['department'] && $instructor['status'] == 'Active' && $instructor['role'] == $room['authorized_personnel']) {
                    $_SESSION['location'] = $room['room'];
                    $_SESSION['department'] = $room['department'];
                    $_SESSION['descr'] = $room['descr'];
                    echo 'success';  // Send 'success' response
                    exit();
                } else {
                    echo "You're not allowed to open this room.";
                }
            } else {
                echo "Incorrect Password.";
            }
        } else {
            echo "RFID number not found.";
        }
    }
}
?>
