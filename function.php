<?php

function check_log($con)
{
	if(isset($_SESSION['userID']))
	{
		$id = $_SESSION['userID'];
		$query = "select * from user where userID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}else
	{
		header("Location: login&register.php");
		die;
	}

	// //if not logged in , redirect to login
	// 	header("Location: login&register.php");
	// 	die;
}