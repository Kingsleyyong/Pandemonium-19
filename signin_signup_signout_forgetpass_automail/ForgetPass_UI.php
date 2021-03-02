<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forget Password</title>
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<style>
		body,html{
			background: #30343F;
		}
		#forget fieldset{
			width: 380px;
			height: 300px;
			position: relative;
			margin: 9% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 10px;
			background-color: #E4D9FF;
			text-align: center;
		}

		#forget input[type="email"]{
			background:transparent;
			padding: 10px 10px;
			border: none;
			border-bottom: 1px solid black;
			width: 200px;
		}

		.send{
			margin-top: 1em;
			background: #8080ff;
			border: 0;
			border-radius: 30px;
			padding: 10px 20px;
			cursor: pointer;

		}

		#forget a:hover{
			color: black;
		}


	</style>
</head>
<body>
	<div id="container">
		<div id="forget-box">
			<form id="forget" action="forget.php" method="post">
				<fieldset>
					<p style="text-align: center;">Forget Password</p>
					<label for="email">Enter Email : </label>
					<input type="email" id="email" name="email" class="email" placeholder="Enter Email Here. . ." required>
					<br><br>
					<input type="submit" class="send" value="Send New Password">
					<br><br><br>
					<a href="SignInUp_UI.php" style="text-decoration-line: none;">Back to login page</a>
				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>