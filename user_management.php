<?php
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
</head>
<body>

	<div class = "user-container">
		<table style="border: 1px solid black;">
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Roles</th>
				<th>Option</th>
			</tr>
		</table>


</body>
</html>