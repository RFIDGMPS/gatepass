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

        // Get the POST data
        $department_name = $_POST['dptname'];
        $department_desc = $_POST['dptdesc'];
        
        
        // Prepare an INSERT query with placeholders
        $query = "INSERT INTO department (department_name, department_desc) VALUES (?, ?)";
        
        // Initialize a prepared statement
        $stmt = $db->prepare($query);
        
        if ($stmt) {
            // Bind parameters to the query (s = string)
            $stmt->bind_param("ss", $department_name, $department_desc);
        
            // Execute the statement
            if ($stmt->execute()) {
                echo 'success';
            } else {
                // Handle execution error
                echo "Error: " . $stmt->error;
            }
        
            // Close the statement
            $stmt->close();
        } else {
            // Handle query preparation error
            echo "Error preparing statement: " . $db->error;
        }
        
        // Close the database connection
        $db->close();
     
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
            case 'add_room':
           
                // Get POST data
                $room = $_POST['roomname'];
                $department = $_POST['roomdpt'];
                $descr = $_POST['roomdesc'];
                $role = $_POST['roomrole'];
                $password = password_hash($_POST['roompass'], PASSWORD_DEFAULT);
                
                // Prepare the INSERT query with placeholders
                $query = "INSERT INTO rooms (room, authorized_personnel, department, password, descr) VALUES (?, ?, ?, ?, ?)";
                
                // Initialize a prepared statement
                $stmt = $db->prepare($query);
                
                if ($stmt) {
                    // Bind parameters to the query (s = string)
                    $stmt->bind_param("sssss", $room, $role, $department, $password, $descr);
                
                    // Execute the statement
                    if ($stmt->execute()) {
                        echo 'success';
                    } else {
                        // Handle execution error
                        echo "Error: " . $stmt->error;
                    }
                
                    // Close the statement
                    $stmt->close();
                } else {
                    // Handle query preparation error
                    echo "Error preparing statement: " . $db->error;
                }
                
                // Close the database connection
                $db->close();
             
                break;

                 


                  case 'add_lost_card':


                                // Get the ID from the hidden input
                                $id = $_POST['id'];
                            
                                // Handle the uploaded photo
                                $data_uri = $_POST['capturedImage'];
                              
                                $encodedData = str_replace(' ', '+', $data_uri);
                                list($type, $encodedData) = explode(';', $encodedData);
                                list(, $encodedData) = explode(',', $encodedData);
                                $decodedData = base64_decode($encodedData);

                                $imageName = $_POST['ss'] . '.jpeg';
                                $filePath = 'uploads/' . $imageName;
                                // Get the current date and time
                                $date_requested = date('Y-m-d H:i:s');
                                
                                // SQL query with the PHP variable
                                if (file_put_contents($filePath, $decodedData)) {
                                $query = "INSERT INTO lostcard (personnel_id, date_requested,verification_photo, status) 
                                          VALUES ('$id', '$date_requested', '$imageName',0)";
                            
                                // Execute the query
                                mysqli_query($db, $query) or die('Error in updating Database');
                               
                                // Alert and redirect
                              
 
                                }
                            
    break;
}
?>
        
