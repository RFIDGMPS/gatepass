<?php
include 'connection.php';

$location = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $password1 = htmlspecialchars($_POST['Ppassword'], ENT_QUOTES, 'UTF-8');
    $Prfid_number = htmlspecialchars($_POST['Prfid_number'], ENT_QUOTES, 'UTF-8');
    
    // Escape special characters for database use
    $password1 = mysqli_real_escape_string($db, stripslashes($password1));
    
    // Initialize an error message variable
    $error_message = '';
    
    // Check if user is a security personnel at the gate
    $sql1 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number'";
    $result1 = $db->query($sql1);
    
    if ($result1 && $result1->num_rows > 0 && $location === "Gate") {
        $personell = $result1->fetch_assoc();
        
        // Validate password
        if ($password1 === "gate123") {
            if ($personell['role'] === 'Security Personnel' && $personell['status'] === 'Active') {
                // Successful login, redirect
                $_SESSION['location'] = 'Main Gate';
                $_SESSION['department'] = 'main';
                echo '<script>window.location = "main.php";</script>';
                exit();
            } else {
                $error_message = "You're not allowed to open the Main Gate.";
            }
        } else {
            $error_message = "Incorrect Password.";
        }
    } else {
        $error_message = "RFID number not found.";
      
    }
    


    // If not security personnel, check for room login
    $sql2 = "SELECT * FROM rooms WHERE room = '$location'";
    $result2 = $db->query($sql2);

    if ($result2->num_rows > 0) {
        $room = $result2->fetch_assoc();
        $sql3 = "SELECT * FROM personell WHERE rfid_number = '$Prfid_number' AND department = '{$room['department']}' AND role = 'Instructor'";
        $result3 = $db->query($sql3);

        if ($result3->num_rows > 0) {
            $instructor = $result3->fetch_assoc();
            // Verify password and ensure the department matches
            if(password_verify($password1, $room['password'])){
            if ($instructor['department'] == $room['department'] && $instructor['status'] == 'Active') {
                // Successful login, redirect
                $_SESSION['location'] = $room['room'];
                $_SESSION['department'] = $room['department'];
                $_SESSION['descr'] = $room['descr'];
                echo '<script>window.location = "main.php";</script>';
                exit();
            }else {
                $error_message = "You're not allowed to open this room.";
            }
        }
        else {
            $error_message = "Incorrect Password.";
        }
    } else {
        $error_message = "RFID number not found.";
      
    }

    // Invalid login
}
}
?>