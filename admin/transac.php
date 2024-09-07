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
        $query = "INSERT INTO personell (id_no, rfid_number, last_name, first_name, middle_name, date_of_birth, role, sex, civil_status, contact_number, email_address, department, section, status, complete_address, photo, place_of_birth)
        VALUES ('$id_no', '$rfid_number', '$last_name', '$first_name', '$middle_name', '$date_of_birth', '$role', '$sex', '$civil_status', '$contact_number', '$email_address', '$department', '$section', '$status', '$complete_address', '$photo', '$place_of_birth')";
        mysqli_query($db, $query) or die('Error in updating Database');
        echo '<script type="text/javascript">
        alert("Successfully added.");
        window.location = "personell.php";
</script>';
    break;
    case 'add_department':
        $department_name = $_POST['department_name'];
        $department_desc = $_POST['department_desc'];
        $query = "INSERT INTO department (department_name, department_desc)
        VALUES ('$department_name', '$department_desc')";
        mysqli_query($db, $query) or die('Error in updating Database');
        echo '<script type="text/javascript">
        alert("Successfully added.");
        window.location = "department.php";
</script>';
        break;
        case 'add_visitor':
            $v_code = $_POST['v_code'];
            $rfid_number = $_POST['rfid_number'];
            $query = "INSERT INTO visitor (v_code, rfid_number)
            VALUES ('$v_code', '$rfid_number')";
            mysqli_query($db, $query) or die('Error in updating Database');
            echo '<script type="text/javascript">
            alert("Successfully added.");
            window.location = "visitor.php";
    </script>';
            break;
        case 'add_visitor_log':

                if (isset($_POST['capturedImage'])) {
                        
                $v_code = $_POST['v_code'];
                $rfid_number = $_POST['rfid_number'];
                date_default_timezone_set('Asia/Manila'); // Set your timezone
                $time = date('H:i:s'); // Current time
                $name = $_POST['fullName'];
                $department = $_POST['department'];
                $sex = $_POST['sex'];
                $civil_status = $_POST['stat'];
                $contact_number = $_POST['contact_number'];
                $address = $_POST['address'];
                $purpose = $_POST['purpose'];
               
               
                $date_logged = date('Y-m-d'); // Current date as date_logged
               
                // Determine appropriate time field to update
               
                $update_field = null;
    

                        $data_uri = $_POST['capturedImage'];
                        $encodedData = str_replace(' ', '+', $data_uri);
                        list($type, $encodedData) = explode(';', $encodedData);
                        list(, $encodedData) = explode(',', $encodedData);
                        $decodedData = base64_decode($encodedData);
                
                        $imageName = $_POST['fullName'] . '.jpeg';
                        $filePath = 'uploads/' . $imageName;
                
                        $current_period=date('A');

 //$time_field = $current_period === "AM" ? 'time_in_am' : 'time_in_pm';




                        if (file_put_contents($filePath, $decodedData)) {
                            // Insert query for entrance table
                            $insert_query = "INSERT INTO visitor_logs (photo, v_code, name, rfid_number,  time_in, date_logged, department, sex,civil_status,contact_number,address,purpose,role) 
                            VALUES ('$imageName','$v_code', '$name', '$rfid_number', '$time', '$date_logged', '$department', '$sex','$civil_status','$contact_number','$address','$purpose','Visitor')";
                  
                            // Execute query
                            if (mysqli_query($db, $insert_query)) {
                                echo '<script type="text/javascript">
                       
                              </script>';
                            } else {
                                echo "Error updating record: " . mysqli_error($db);
                            }
                        } else {
                            echo 'Error saving image.';
                        }
                    } else {
                        echo 'No image data received.';
                    }















    
        
        break;
        case 'add_role':
      
            $role = $_POST['role1'];
            
            $query = "INSERT INTO role (id,role)
            VALUES (NULL,'$role')";
            mysqli_query($db, $query) or die('Error in updating Database');
            echo '<script type="text/javascript">
            alert("Successfully added.");
            window.location = "role.php";
    </script>';
          
            break;
}
?>
        
