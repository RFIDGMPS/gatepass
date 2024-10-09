<?php
   header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type");
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
        $category = $_POST['category'];
        $complete_address = $_POST['complete_address'];
        
        echo '<script>alert('.isset($_FILES['photo']).');</script>';
        echo '<script>alert('.$_FILES['photo']['error'].');</script>';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            // Handle photo upload
            $photo = $_FILES['photo']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            
            // Validate image upload (check file type and size)
            $allowed_file_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_type = mime_content_type($_FILES['photo']['tmp_name']);
            $file_size = $_FILES['photo']['size'];
        
            if (!in_array($file_type, $allowed_file_types)) {
                //echo "Error: Only JPEG, PNG, and GIF files are allowed.";
                echo json_encode(['success' => false, 'message' => 'Error: Only JPEG, PNG, and GIF files are allowed.']);
            exit;
                
            }
        
            if ($file_size > 2 * 1024 * 1024) { // 2 MB limit
                //echo "Error: File size must be less than 2MB.";
                echo json_encode(['success' => false, 'message' => 'Error: File size must be less than 2MB.']);
            exit;
            }
        
            // Move file to target directory
            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
               // echo 'Error: There was an issue uploading the photo.';
                echo json_encode(['success' => false, 'message' => 'Error: There was an issue uploading the photo.']);
            exit;
            }
        } else {
            // Photo not uploaded or error in upload
            //echo 'Error: Photo is required. Please upload a valid photo.';
            echo json_encode(['success' => false, 'message' => 'Error: Photo is required. Please upload a valid photo.']);
            exit;
        }
        
        // Use prepared statements to prevent SQL injection
        $stmt = $db->prepare("SELECT * FROM personell WHERE rfid_number = ?");
        $stmt->bind_param("s", $rfid_number);
        $stmt->execute();
        $rfid_result = $stmt->get_result();
        
        $stmt = $db->prepare("SELECT * FROM personell WHERE first_name = ? AND middle_name = ? AND last_name = ?");
        $stmt->bind_param("sss", $first_name, $middle_name, $last_name);
        $stmt->execute();
        $fullname_result = $stmt->get_result();
        
       
        if ($rfid_result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'RFID number already exists.']);
            exit;
        } elseif ($fullname_result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Full name already exists.']);
            exit;
        } else {
        
            // Proceed with database insertion
            $query = "INSERT INTO personell 
                     (id_no, category, rfid_number, last_name, first_name, middle_name, date_of_birth, role, sex, civil_status, contact_number, email_address, department, section, status, complete_address, photo, place_of_birth)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Prepare and bind parameters to prevent SQL injection
            $stmt = $db->prepare($query);
            $stmt->bind_param(
                "ssssssssssssssssss", 
                $id_no, $category, $rfid_number, $last_name, $first_name, $middle_name, $date_of_birth, $role, $sex, $civil_status, 
                $contact_number, $email_address, $department, $section, $status, $complete_address, $photo, $place_of_birth
            );
        
            if ($stmt->execute()) {
               // echo 'success';
                $success=true;
                echo json_encode(['success' => true, 'message' => 'User added successfully']);
            } else {
                //echo 'Error in updating Database';
                echo json_encode(['success' => false, 'message' => 'Error in updating Database']);
            }
        }
        
    
      
        $stmt->close();
        $db->close();
    
        
       
        
    break;
    case 'add_department':
// Get the POST data
$department_name = $_POST['dptname'];
$department_desc = $_POST['dptdesc'];

// Prepare a SELECT query to check if the department already exists
$checkQuery = "SELECT COUNT(*) FROM department WHERE department_name = ?";

// Initialize a prepared statement for the SELECT query
$stmt = $db->prepare($checkQuery);

if ($stmt) {
    // Bind the parameter (s = string) to check for department name
    $stmt->bind_param("s", $department_name);
    
    // Execute the statement
    $stmt->execute();
    
    // Bind the result to a variable
    $stmt->bind_result($count);
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    if ($count > 0) {
        // Department already exists
        echo "Department already exist.";
    } else {
        // If the department does not exist, insert the new record

        // Prepare an INSERT query with placeholders
        $query = "INSERT INTO department (department_name, department_desc) VALUES (?, ?)";
        
        // Initialize a prepared statement for the INSERT query
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
    }
} else {
    // Handle query preparation error for the SELECT query
    echo "Error preparing SELECT statement: " . $db->error;
}

// Close the database connection
$db->close();

     
        break;
        case 'add_visitor':
           
           
            if (isset($_POST['rfid_number'])) {
                $rfid_number = $_POST['rfid_number'];
            
                // Check if the RFID number is exactly 10 digits
                if (strlen($rfid_number) !== 10 || !ctype_digit($rfid_number)) {
                    echo 'RFID number must be exactly 10 digits.';
                    return;
                }
            
                // Prepare the query to check if the RFID number already exists
                $checkQuery = "SELECT * FROM visitor WHERE rfid_number = ?";
                $checkStmt = $db->prepare($checkQuery);
                $checkStmt->bind_param('s', $rfid_number);
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();
            
                // Check if the RFID number already exists
                if ($checkResult->num_rows > 0) {
                    echo 'RFID number already exists.';
                } else {
                    // Prepare the insert query
                    $insertQuery = "INSERT INTO visitor (rfid_number) VALUES (?)";
                    $insertStmt = $db->prepare($insertQuery);
                    $insertStmt->bind_param('s', $rfid_number);
            
                    // Execute the insert query and check for success
                    if ($insertStmt->execute()) {
                        echo 'success';
                    } else {
                        echo 'Error in updating Database: ' . $insertStmt->error;
                    }
            
                    // Close the insert statement
                    $insertStmt->close();
                }
            
                // Close the check statement
                $checkStmt->close();
            }
            
            
            
            
            break;
        
        case 'add_role':
      
            
            if (isset($_POST['role'])) {
                $role = $_POST['role'];
            
                // Check if the role already exists
                $check_query = "SELECT * FROM role WHERE role = ?";
                $stmt = $db->prepare($check_query);
                $stmt->bind_param('s', $role);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows > 0) {
                    // Role already exists
                    echo 'Role already exist.';
                } else {
                    // Role does not exist, insert the new role
                    $stmt->close(); // Close the previous statement
            
                    // Prepare the insertion query
                    $insert_query = "INSERT INTO role (role) VALUES (?)";
                    $stmt = $db->prepare($insert_query);
                    $stmt->bind_param('s', $role);
            
                    // Execute the query and check for success
                    if ($stmt->execute()) {
                        echo 'success';
                    } else {
                        echo 'Error in updating Database: ' . $stmt->error;
                    }
                }
            
                // Close the statement
                $stmt->close();
            }
         
            
           
            
          
            break;
            case 'add_room':
           
               // Get POST data
$room = $_POST['roomname'];
$department = $_POST['roomdpt'];
$descr = $_POST['roomdesc'];
$role = $_POST['roomrole'];
$password = password_hash($_POST['roompass'], PASSWORD_DEFAULT);

// Check if the room and department already exist
$checkQuery = "SELECT COUNT(*) FROM rooms WHERE room = ? AND department = ?";

// Initialize a prepared statement for the SELECT query
$stmt = $db->prepare($checkQuery);

if ($stmt) {
    // Bind parameters to the query (s = string)
    $stmt->bind_param("ss", $room, $department);

    // Execute the query
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($count);
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    if ($count > 0) {
        // Room and department already exist
        echo "Room already exist on the same department.";
    } else {
        // Proceed with the INSERT query if no duplicates are found

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
    }
} else {
    // Handle query preparation error for the SELECT query
    echo "Error preparing SELECT statement: " . $db->error;
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
        
