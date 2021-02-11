<?php
session_start();

	include("connect.php");
	include("function.php");

	//if a form is posted
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$userName = $_POST['username'];
		$userEmail = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($userName) && !empty($password) && !empty($userEmail))
		{
			$query = "insert into user (user_name,user_email,password) values ('$userName','$userEmail','$password')";
			if($result = mysqli_query($con, $query))
			{
				?>
				<script type="text/javascript">
				alert("You have sucessfully Register! Please login!");
				</script>
				<?php
			}
			else
			{
				echo "Fail to register";
			}
			header("refresh: 0.5; url = login&register.php");
		}else
		{
			echo "Invalid information";
		}
	}
?>