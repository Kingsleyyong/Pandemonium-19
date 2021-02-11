<?php
session_start();

	include("connect.php");  	//including connect.php to this file
	include("function.php");      //including function.php to this file
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Log In</title>
	<style>
		body,
		html {
			margin: 0;
			padding: 0;
			background: #30343F;
		}

		#loginbox {
			width: 380px;
			height: 480px;
			position: relative;
			margin: 6% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 5px;
			background-color: #E4D9FF;
			overflow: hidden;
		}

		#ButtonBox {
			width: 220px;
			margin: 35px auto;
			position: relative;
			border-radius: 30px;
			box-shadow: 0 0 20px 9px #8997D2;
		}

		.sButton {
			padding: 10px 30px;
			cursor: pointer;
			border: none;
			background: transparent;
			position: relative;
			outline: none;
		}

		#btn {
			top: 0;
			left: 0;
			position: absolute;
			width: 110px;
			height: 100%;
			background: linear-gradient(to right, #8997D2, #8997D2);
			border-radius: 30px;
			transition: .4s;
		}

		.inputGroup {
			top: 120px;
			position: absolute;
			width: 280px;
			transition: .4s;
		}

		.inputMember {
			width: 100%;
			padding: 10px 10px;
			margin: 5px 0;
			border: none;
			border-bottom: 1px solid black;
			background: transparent;
		}

		.LoginBtn {
			width: 85%;
			padding: 10px 30px;
			cursor: pointer;
			margin: auto;
			margin-top: 20px;
			margin-left: 30px;
			border: none;
			border-radius: 30px;
			background: #8080ff;
		}

		.LoginBtn:hover {
			background: #2e2eb8;
		}

		#forget {
			font-size: 15px;
			bottom: -30px;
			position: absolute;
			left: 10px;
		}

		#signin {
			left: 50px;
		}

		#Register {
			left: 450px;
		}

		.checkbox {
			margin: 30px 10px 30px 0;
		}
	</style>
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

			<!-- validate username and password -->
			<?php 
				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					$userEmail = $_POST['email'];
					$password = $_POST['password'];

					if( !empty($password) && !empty($userEmail))
					{
						$query = "select * from user where user_email = '$userEmail' limit 1";

						$result = mysqli_query($con,$query);

						if($result) //if result is succesful
						{
							if($result && mysqli_num_rows($result)>0)
							{
								$user_data = mysqli_fetch_assoc($result);

								if($user_data['password'] === $password)
								{
									if($user_data['type'] === "User")
									{
										$_SESSION['id'] = $user_data['id'];
										header("Location: index.php");
										die;
									}
									else if($user_data['type'] === "Admin")
									{
										$_SESSION['id'] = $user_data['id'];
										header("Location: adminpage.php");
										die;
									}
								}
							}				
						}
						else
						{
						?>
							<script type="text/javascript">
								alert("Invalid username or password");
							</script>
						<?php
						}
					
					}else
					{
						echo "Invalid information";
					}
				} ?>

		<!-- Register form -->
			<form id="Register" class="inputGroup" action="register.php" method="post">
				<input type="text" class="inputMember" placeholder="Username" name="username" required>
				<input type="Email" class="inputMember" placeholder=" Email" name="email" required>
				<input type="password" class="inputMember" placeholder="Password" name= "password" required id="pass">
				<input type="password" class="inputMember" placeholder="Confirm Password" name="confirm_password" required
					id="confirm_password">
				<input type="checkbox" class="checkbox" required><span>I agree to the <a href="termNcondition.html"
						target="_blank"><u>Terms & Conditions<u></a></span>
				<button type="submit" class="LoginBtn">Register</button>
			</form>
			<script>
				// for the buttton function in login and register
				var s = document.getElementById("signin");
				var r = document.getElementById("Register");
				var b = document.getElementById("btn");


				function Register() {
					s.style.left = "-400px";
					r.style.left = "50px";
					b.style.left = "110px";
				}
				function signin() {
					s.style.left = "50px";
					r.style.left = "450px";
					b.style.left = "0px";
				}

				// checking whether the password and confirm password are match
				var password = document.getElementById("pass");
				var confirm_password = document.getElementById("confirm_password");
				function verifyPassword() {
					if (password.value != confirm_password.value) {
						confirm_password.setCustomValidity("Passwords are not match!");
					}
					else {
						confirm_password.setCustomValidity('');
					}
				}
				password.onchange = verifyPassword;
				confirm_password.onkeyup = verifyPassword;
			</script>

		</div>
	</div>
</body>
</html>
