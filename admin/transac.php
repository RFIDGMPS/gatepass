<?php
       
 include('../connection.php');
       
       





switch ($_GET['action'])
{
    case 'add':
        $id_no = $_POST['id_no'];
 $rfid_number = $_POST['rfid_number'];
 $last_name = $_POST['last_name'];
 $first_name = $_POST['first_name'];
 $middle_name = $_POST['middle_name'];
 $date_of_birth = $_POST['date_of_birth'];
 $place_of_birth = $_POST['place_of_birth'];
 $role = $_POST['role'];
 $sex = $_POST['sex'];
 $civil_status = $_POST['stat'];
 $contact_number = $_POST['contact_number'];
 $email_address = $_POST['email_address'];
 $department = $_POST['department'];
 $section = $_POST['section'];
 $status = $_POST['status'];
 $complete_address = $_POST['complete_address'];
 $photo = $_FILES['photo']['name'];

 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["photo"]["name"]);
 move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        $query = "INSERT INTO users (id_no, rfid_number, last_name, first_name, middle_name, date_of_birth, role, sex, civil_status, contact_number, email_address, department, section, status, complete_address, photo, place_of_birth)
        VALUES ('$id_no', '$rfid_number', '$last_name', '$first_name', '$middle_name', '$date_of_birth', '$role', '$sex', '$civil_status', '$contact_number', '$email_address', '$department', '$section', '$status', '$complete_address', '$photo', '$place_of_birth')";
        mysqli_query($db, $query) or die('Error in updating Database');

    break;
    case 'add_department':
        $department_name = $_POST['department_name'];
        $department_desc = $_POST['department_desc'];
        $query = "INSERT INTO department (department_name, department_desc)
        VALUES ('$department_name', '$department_desc')";
        mysqli_query($db, $query) or die('Error in updating Database');
        break;
}
?>
        <script type="text/javascript">
            alert("Successfully added.");
            window.location = "department.php";
    </script>
