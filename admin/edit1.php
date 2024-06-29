
<?php

		 $photo= $_FILES['photo']['name'];
$id = $_GET['id'];

		 $target_dir = "uploads/";
		 $target_file = $target_dir . basename($_FILES["photo"]["name"]);
		 move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		 
		 $id_no= $_POST['id_no'];
		 $rfid_number=$_POST['rfid_number'];
		 $last_name=$_POST['last_name'];
		 $first_name=$_POST['first_name'];
		$middle_name=$_POST['middle_name'];
			$date_of_birth=$_POST['date_of_birth'];
			$place_of_birth=$_POST['place_of_birth'];
			$sex=$_POST['sex'];
			$civil_status=$_POST['civil_status'];
			$contact_number=$_POST['contact_number'];
	   $email_address=$_POST['email_address'];
			  $department=$_POST['department'];
	   $role=$_POST['role'];
					$status=$_POST['status'];
					$address=$_POST['address'];
			
	   include('connection.php');
		
	 			$query = "UPDATE users SET 
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
				 complete_address = '$address' 
			 WHERE id = '$id'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "users.php";
		</script>
