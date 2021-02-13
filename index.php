<?php
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_log($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>user main page</title>
</head>
<body>

	<h1>User page</h1>
	Hello, <?php echo $user_data['user_name']; ?><br>
	<a href="logout.php">log out</a>


</body>
</html>