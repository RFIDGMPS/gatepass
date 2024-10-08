<?php
include 'connection.php';

// Start the session for secure operations
session_start();

// Set session cookies to secure options
ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
ini_set('session.cookie_secure', 1);   // Use only over HTTPS
ini_set('session.use_only_cookies', 1); // Use only cookies for session

if (isset($_GET['department'])) {
    // Sanitize the input using filter_input to prevent XSS attacks
    $selected_department = filter_input(INPUT_GET, 'department', FILTER_SANITIZE_STRING);

    // Check if the input is valid
    if ($selected_department) {
        // Query to fetch rooms based on the selected department
        $sql = "SELECT * FROM rooms WHERE department = ?";
        $stmt = $db->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $selected_department);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are any rooms
            if ($result->num_rows > 0) {
                // Generate room options
                while ($row = $result->fetch_assoc()) {
                    $room = htmlspecialchars($row['room'], ENT_QUOTES, 'UTF-8');
                    echo "<option value='$room'>$room</option>";
                }
            } else {
                // No rooms available for the selected department
                echo "<option value=''>No rooms available</option>";
            }

            $stmt->close();
        } else {
            // Handle query preparation failure
            echo "<option value=''>Error fetching rooms</option>";
        }
    } else {
        // Invalid input
        echo "<option value=''>Invalid department selected</option>";
    }
} else {
    // No department provided
    echo "<option value=''>No department selected</option>";
}

// Close the database connection if necessary
$db->close();
?>
