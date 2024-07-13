<?php
	require_once '../connection.php';

	switch ($_GET['type'])
{
    case 'user':
       
		$db->query("DELETE FROM `users` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error($db));
		echo'<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "users.php";
			</script>	';
    break;
    case 'department':
		$db->query("DELETE FROM `department` WHERE `department_id` = '$_REQUEST[id]'") or die(mysqli_error($db));
		echo'<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "department.php";
			</script>	';
        break;
}
	?>
	
	