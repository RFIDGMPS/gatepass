<?php
	require_once '../connection.php';

	switch ($_GET['type'])
{
    case 'personell':
       
		$db->query("DELETE FROM `personell` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error($db));
		echo'<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "personell.php";
			</script>	';
    break;
    case 'department':
		$db->query("DELETE FROM `department` WHERE `department_id` = '$_REQUEST[id]'") or die(mysqli_error($db));
		echo'<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "department.php";
			</script>	';
        break;
		case 'visitor':
			$db->query("DELETE FROM `visitor` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error($db));
			echo'<script type="text/javascript">
					alert("Successfully Deleted.");
					window.location = "visitor.php";
				</script>	';
			break;
			case 'role':
				$db->query("DELETE FROM `role` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error($db));
				echo'<script type="text/javascript">
						alert("Successfully Deleted.");
						window.location = "role.php";
					</script>	';
				break;
				case 'room':
					$db->query("DELETE FROM `rooms` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error($db));
					echo'<script type="text/javascript">
							alert("Successfully Deleted.");
							window.location = "room.php";
						</script>	';
					break;
}
	?>
	
	