<?php
	//allow link to every page when user logged in
	session_start();
	require("../database/connect.php");
	// include("../function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="loginStyle.css"> -->
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <title>Sign In Page</title>
<<<<<<< HEAD

	<style>
		
body, html {
	margin: 0;
	padding: 0;
	background: #30343F;
}

#loginbox {
	width: 380px;
	height: 600px;
	position: relative;
	margin: 4% auto;
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

.inputMemberRB {
	margin: 15px 15px;
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

=======
	<style>
		body, html {
			margin: 0;
			padding: 0;
			background: #30343F;
		}

		#loginbox {
			width: 380px;
			height: 650px;
			position: relative;
			margin: 5% auto;
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

		.inputMemberRB {
			margin: 15px 15px;
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
>>>>>>> 795da15ba9e8be2cf3f524394115b375ff87fd92
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
			<form id="signin" class="inputGroup" action="loginAction.php" method="post">
				<input type="Email" class="inputMember" placeholder="Email" name="email" required>
				<input type="password" class="inputMember" placeholder="Password" name="password" required>
				<button type="submit" class="LoginBtn" name="login">Log In</button>
				<a href="ForgetPass_UI.php" target="_blank" id="forget">Forget password</a>
			</form>

		<!-- Register form -->
			<form id="Register" class="inputGroup" action="registerAction.php" method="post">
				<input type="text" class="inputMember" placeholder="Username" name="username" required>
				<input type="tel" class="inputMember" placeholder="Contact eg: 0123456789" 
						pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" name="contact" required>
				<input type="radio" class="inputMemberRB" name="gender" value="Male" required>Male
				<input type="radio" class="inputMemberRB" name="gender" value="Female" required>Female
				<input type="Email" class="inputMember" placeholder=" Email" name="email" required>
				<input type="password" class="inputMember" placeholder="Password" name= "password" required id="pass">
				<input type="password" class="inputMember" placeholder="Confirm Password" name="confirm_password" required
					id="confirm_password">
				<input type="date" class="inputMember" name="dob" required placeholder="Date Of Birth">
				<textarea class="inputMember" name="address" required placeholder="Residential Address"></textarea>
				<input type="checkbox" class="checkbox" required><span>I agree to the <a href="termNcondition_UI.html"
						target="_blank"><u>Terms & Conditions<u></a></span>
				<button type="submit" class="LoginBtn">Register</button>
			</form>
		</div>
	</div>
	<script src="function.js"></script>
</body>
</html>