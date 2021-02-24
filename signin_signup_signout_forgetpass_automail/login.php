<?php
	//allow link to every page when user logged in
	session_start();
	require("connect.php");
	include("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>Sign In Page</title>
</head>
<body>
    <div id="container">
		<div id="loginbox">
			<section id="ButtonBox">
				<section id="btn"></section>
				<button type="button" class="sButton" onclick="signin()">Log In</button>
				<button type="button" class="sButton" onclick="Register()">Register</button>
			</section>

		<!--login form -->
			<form id="signin" class="inputGroup" action="" method="post">
				<input type="Email" class="inputMember" placeholder="Email" name="email" required>
				<input type="password" class="inputMember" placeholder="Password" name="password" required>
				<span style="padding: 10px;">Select User Type : <select name="usertype">
					<option value="admin">admin</option>
					<option value="user" selected>user</option>
				</select></span>
				<button type="submit" class="LoginBtn" name="login">Log In</button>
				<a href="forgetpass.php" target="_blank" id="forget">Forget password</a>
			</form>

			<?php 

				//The different with $_POST and $_SERVER['REQUEST_METHOD'] == "POST" is:
					//$_POST is sending the data
					//$_SERVER['REQUEST_METHOD'] == "POST" is sending the method.
				//Note that $_SERVER['REQUEST_METHOD'] == "POST" can submit if there dont have any data
				//inside in it.
				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					$userEmail = $_POST['email'];
					$password = $_POST['password'];

					if( !empty($password) && !empty($userEmail))
					{
						$query = "select * from user where userEmail = '$userEmail'";

						$result = mysqli_query($con,$query);
						
						//if result is succesful
						if($result) 
						{
							if($result && mysqli_num_rows($result)==1)
							{
								$user_data = mysqli_fetch_assoc($result);

								if($user_data['userPassword'] === $password)
								{
									if($user_data['userType'] === "User")
									{
										$_SESSION['userID'] = $user_data['userID'];
										header("Location: ../main.php");
										die;
									}
									else if($user_data['userType'] === "Admin")
									{
										$_SESSION['userID'] = $user_data['userID'];
										header("Location: ../admin/home.html");
										die;
									}
								}
							}
							else
							{
								?>
								<script type="text/javascript">
								alert("Invalid user name or password!");
								</script>
								<?php
							}				
						}
						
					}
				} 
			?>

		<!-- Register form -->
			<form id="Register" class="inputGroup" action="register.php" method="post">
				<input type="text" class="inputMember" placeholder="Username" name="username" required>
				<input type="text" class="inputMember" placeholder="Contact eg: 0123456789" name="contact" required>
				<input type="text" class="inputMember" placeholder="male/female/others" name="gender" required>
				<input type="Email" class="inputMember" placeholder=" Email" name="email" required>
				<input type="password" class="inputMember" placeholder="Password" name= "password" required id="pass">
				<input type="password" class="inputMember" placeholder="Confirm Password" name="confirm_password" required
					id="confirm_password">
				<input type="date" class="inputMember" name="dob" require>
				<input type="checkbox" class="checkbox" required><span>I agree to the <a href="termNcondition.html"
						target="_blank"><u>Terms & Conditions<u></a></span>
				<button type="submit" class="LoginBtn">Register</button>
			</form>
		</div>
	</div>
    <script src="function.js"></script>
</body>
</html>