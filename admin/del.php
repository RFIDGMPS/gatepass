<?php
	require_once 'connection.php';
	$db->query("DELETE FROM `users` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	?>
	<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "users.php";
			</script>	
	