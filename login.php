<?php
session_start();
include 'connection.php';  // Ensure this file contains the DB connection logic

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');
    
    $password1 = mysqli_real_escape_string($db, stripslashes($password1));

    // Check if user is security personnel at the gate
    $sql1 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number'";
    $result1 = $db->query($sql1);

    if ($location === "Gate" && $result1 && $result1->num_rows > 0) {
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
        echo $location ;
    }

    // Additional logic for room login
    $sql2 = "SELECT * FROM rooms WHERE room = '$location'";
    $result2 = $db->query($sql2);

    if ($result2->num_rows > 0) {
        $room = $result2->fetch_assoc();
        $sql3 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number' AND department = '{$room['department']}' AND role = 'Instructor'";
        $result3 = $db->query($sql3);

        if ($result3->num_rows > 0) {
            $instructor = $result3->fetch_assoc();
            if(password_verify($password1, $room['password'])) {
                if ($instructor['department'] == $room['department'] && $instructor['status'] == 'Active') {
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
