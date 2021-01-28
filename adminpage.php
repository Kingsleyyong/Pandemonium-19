<?php
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_log($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin main page</title>
</head>
<body>
	<h1>Admin page</h1>
	Hello, <?php echo $user_data['user_name']; ?><br>
	<a href="logout.php">log out</a>

</body>
</html>