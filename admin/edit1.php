
<?php
  include('../connection.php');

		
					


switch ($_GET['edit'])
{
    case 'personell':
		
		$id = $_GET['id'];
				 $photo=$_POST['capturedImage'].' ';
	
				 $photo= trim($photo,"uploads/");
			
				 $id_no= $_POST['id_no'];
				 $rfid_number=$_POST['rfid_number'];
				 $last_name=$_POST['last_name'];
				 $first_name=$_POST['first_name'];
				$middle_name=$_POST['middle_name'];
					$date_of_birth=$_POST['date_of_birth'];
					$place_of_birth=$_POST['place_of_birth'];
					$sex=$_POST['sex'];
					$civil_status=$_POST['c_status'];
					$contact_number=$_POST['contact_number'];
			   $email_address=$_POST['email_address'];
					  $department=$_POST['e_department'];
					  
			   $role=$_POST['role'];
							$status=$_POST['status'];
							$complete_address=$_POST['complete_address'];
					
							if(isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != null){
								$photo= $_FILES['photo']['name'];
							
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["photo"]["name"]);
								move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
								
							}
							
							
						 $query = "UPDATE personell SET 
						photo = '$photo',
						 id_no = '$id_no', 
						 rfid_number = '$rfid_number', 
						 last_name = '$last_name', 
						 first_name = '$first_name', 
						 middle_name = '$middle_name', 
						 date_of_birth = '$date_of_birth', 
						 place_of_birth = '$place_of_birth', 
						 sex = '$sex', 
						 civil_status = '$civil_status', 
						 contact_number = '$contact_number', 
						 email_address = '$email_address', 
						 department = '$department', 
						 role = '$role', 
						 status = '$status', 
						 complete_address = '$complete_address' 
					 WHERE id = '$id'";


							$result = mysqli_query($db, $query) or die(mysqli_error($db));

							if($status == 'Active'){
								$query1 = "UPDATE lostcard SET 
								 status = 0
								WHERE personnel_id = '$id'";
								$result = mysqli_query($db, $query1) or die(mysqli_error($db));
								}
							echo '<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "personell.php";
		</script>';
    break;
    case 'department':

$id = $_GET['id'];
$department_name = $_POST['dptname'];
$department_desc = $_POST['dptdesc'];


// Prepare an update query with placeholders
$query = "UPDATE department SET department_name = ?, department_desc = ? WHERE department_id = ?";

// Initialize a prepared statement
$stmt = $db->prepare($query);

if ($stmt) {
    // Bind parameters to the query (s = string, i = integer)
    $stmt->bind_param("ssi", $department_name, $department_desc, $id);

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



						break;
						case 'visitor':
							$id = $_GET['id'];
							$v_code = $_POST['v_code'];
							$rfid_number = $_POST['rfid_number'];
							$query = "UPDATE visitor SET 
											v_code = '$v_code',
											rfid_number = '$rfid_number' 
										 WHERE id = '$id'";
												$result = mysqli_query($db, $query) or die(mysqli_error($db));
												echo '<script type="text/javascript">
												alert("Update Successfull.");
												window.location = "visitor.php";
											</script>';
											break;
											case 'about':
												$name = $_POST['name'];
												$address = $_POST['address'];
												$logo1 = $_POST['logo1'];
												$logo2 = $_POST['logo2'];
												$logo1= trim($logo1,"uploads/");
												$logo2= trim($logo2,"uploads/");
												
							if(isset($_FILES['logo1']['name']) && $_FILES['logo1']['name'] != null){
								$logo1= $_FILES['logo1']['name'];
							
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["logo1"]["name"]);
								move_uploaded_file($_FILES["logo1"]["tmp_name"], $target_file);
								
							}

							if(isset($_FILES['logo2']['name']) && $_FILES['logo2']['name'] != null){
								$logo2= $_FILES['logo2']['name'];
							
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["logo2"]["name"]);
								move_uploaded_file($_FILES["logo2"]["tmp_name"], $target_file);
								
							}
						

												$query = "UPDATE about SET 
																name = '$name',
																address = '$address',
																logo1 = '$logo1',
																logo2 = '$logo2'
																WHERE id = 1";
																	$result = mysqli_query($db, $query) or die(mysqli_error($db));
																	echo '<script type="text/javascript">
																	alert("Saved.");
																	window.location = "settings.php";
																</script>';
																break;
																case 'role':
																	$id = $_GET['id'];
																	$role = $_POST['role'];
																
																	$query = "UPDATE role SET 
																					role = '$role'
																					
																				 WHERE id = '$id'";
																						$result = mysqli_query($db, $query) or die(mysqli_error($db));
																						echo '<script type="text/javascript">
																						alert("Update Successfull.");
																						window.location = "role.php";
																					</script>';
																					break;
																					case 'room':
																					
// Get the ID from the URL
$id = $_GET['id'];

// Get the POST data
$room = $_POST['roomname'];
$department = $_POST['dpt'];
$descr = $_POST['roomdesc'];
$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);


// Prepare the UPDATE query with placeholders
$query = "UPDATE rooms SET room = ?, department = ?, descr = ?, password = ? WHERE id = ?";

// Initialize a prepared statement
$stmt = $db->prepare($query);

if ($stmt) {
    // Bind parameters to the query (s = string, i = integer)
    $stmt->bind_param("ssssi", $room, $department, $descr, $password, $id);

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
																					
																
}
?>	
	
