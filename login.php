<?php
session_start();
include 'connection.php';  // Ensure this file contains the DB connection logic

// Pre-hashed Main Gate password (hash of 'gate123')
$main_gate_hashed_password = '$2y$10$KJf21IoF4GhB3I9HgTSseebLZsvQhcBfRhJkMPwp1LhUdPvHf.fz2';  // This is a bcrypt hash of 'gate123'

// Function to handle gate login
function handleGateLogin($db, $Prfid_number, $password1, $main_gate_hashed_password) {
    // Check if user is security personnel at the gate
    $sql1 = "SELECT * FROM personell WHERE rfid_number = ?";
    $stmt1 = $db->prepare($sql1);
    $stmt1->bind_param("s", $Prfid_number);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1 && $result1->num_rows > 0) {
        $personell = $result1->fetch_assoc();
        
        // Use password_verify to check against the pre-hashed 'gate123' password
        if (password_verify($password1, $main_gate_hashed_password)) {
            if ($personell['role'] === 'Security Personnel' && $personell['status'] === 'Active') {
                // Successful login
                session_regenerate_id(true);  // Prevent session fixation
                $_SESSION['location'] = 'Main Gate';
                $_SESSION['department'] = 'main';
                echo 'success';  // Send 'success' response
                exit();
            } else {
                echo "You're not allowed to open the Main Gate.";
                exit();
            }
        } else {
            echo "Incorrect Password.";
            exit();
        }
    } else {
        echo "RFID number not found.";
        exit();
    }
}

// Function to handle room login
function handleRoomLogin($db, $location, $Prfid_number, $password1) {
    // Additional logic for room login
    $sql2 = "SELECT * FROM rooms WHERE room = ?";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bind_param("s", $location);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        $room = $result2->fetch_assoc();

        // Query the personell table for the RFID number and department
        $sql3 = "SELECT * FROM personell WHERE rfid_number = ? AND department = ?";
        $stmt3 = $db->prepare($sql3);
        $stmt3->bind_param("ss", $Prfid_number, $room['department']);
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        if ($result3->num_rows > 0) {
            $instructor = $result3->fetch_assoc();
            
            // Verify password using hashed password from the rooms table
            if (password_verify($password1, $room['password'])) {
                if ($instructor['department'] == $room['department'] && 
                    $instructor['status'] == 'Active' && 
                    $instructor['role'] == $room['authorized_personnel']) {

                    // Successful login
                    session_regenerate_id(true);  // Prevent session fixation
                    $_SESSION['location'] = $room['room'];
                    $_SESSION['department'] = $room['department'];
                    $_SESSION['descr'] = $room['descr'];
                    echo 'success';  // Send 'success' response
                    exit();
                } else {
                    echo "You're not allowed to open this room.";
                    exit();
                }
            } else {
                echo "Incorrect Password.";
                exit();
            }
        } else {
            echo "RFID number not found.";
            exit();
        }
    } else {
        echo "Room not found.";
        exit();
    }
}

// CSRF token generation and verification
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check CSRF token validity
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF token validation failed.');
    }

    // Sanitize inputs
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');

    // Validate inputs
    if (empty($location) || empty($password1) || empty($Prfid_number)) {
        echo "All fields are required.";
        exit();
    }

    // Handle Gate Login
    if ($location === "Gate") {
        handleGateLogin($db, $Prfid_number, $password1, $main_gate_hashed_password);
    }

    // Handle Room Login
    handleRoomLogin($db, $location, $Prfid_number, $password1);
}
?>
