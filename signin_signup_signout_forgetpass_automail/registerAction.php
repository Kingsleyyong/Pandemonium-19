<?php
session_start();

	include("../database/connect.php");
	include("function.php");

	//if a form is posted
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$userName = $_POST['username'];
		$userEmail = $_POST['email'];
		$password = $_POST['password'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$mailmatch = false;


		$result = mysqli_query($con,"SELECT * FROM user WHERE userEmail = '$userEmail'");

		$user_data = mysqli_fetch_assoc($result);
		if($user_data != null) {
			if($userEmail == $user_data['userEmail'])
			{
		?>
			
			
			<script type="text/javascript">
				// email.setCustomValidity("This email has been taken!");
				alert("This email has been taken!");
			</script>
			<?php
			$mailmatch = true;

			header("refresh: 0.2; url = SignInUp_Ui.php");
			}
		}
		else{
			if(!empty($userName) && !empty($password) && !empty($userEmail) &&$mailmatch != true)
			{
				$query = 	"INSERT INTO user (userName,userEmail,userPassword,userContact,gender,dateOfBirth) 
							VALUE ('$userName','$userEmail','$password','$contact','$gender','$dob')";
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
				header("refresh: 0.2; url = SignInUp_Ui.php");
			}else
			{
				echo "Invalid information";
			}
		}
		
		
	}
?>