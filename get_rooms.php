<?php
include 'connection.php';
if (isset($_GET['department'])) {
    $selected_department = $_GET['department'];

    // Query to fetch rooms based on the selected department
    $sql = "SELECT * FROM rooms WHERE department = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $selected_department);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate room options
    while ($row = $result->fetch_assoc()) {
        $room = htmlspecialchars($row['room'], ENT_QUOTES, 'UTF-8');
        echo "<option value='$room'>$room</option>";
    }

    $stmt->close();
}
?>
