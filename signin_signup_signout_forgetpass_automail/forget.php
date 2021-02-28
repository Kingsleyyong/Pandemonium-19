<?php
	session_start();
	include("../database/connect.php");

	$email = $_POST['email'];

	$sql = "select * from user where  userEmail = '$email' limit 1";
	if($result = mysqli_query($con,$sql))
	{
		$record = mysqli_fetch_assoc($result);
		$querrry = "update user set userPassword = '123abc' where userEmail = '$email'";
		if($resullt = mysqli_query($con,$querrry))
		{
			//sending an email
			require_once('../PHPMailer/PHPMailerAutoload.php');
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '465';
			$mail->isHTML();
			$mail->Username = 'corona.iwp.management@gmail.com';
			$mail->Password = '123@abdef';
			$mail->SetFrom('no-reply@gmail.com');
			$mail->Subject = 'Password resetting';
			$mail->Body='Your password have been resetted to 123abc';
			$mail->AddAddress($email);
			
			$mail->Send();

			?>
				<script>
					alert("Successfully resetted password! Please try again if you did not receive an email from us in 60 seconds.");
				</script>
			<?php

			header("refresh: 0.2; url = SignInUp_UI.php");

		}else{
			echo "Error resetting";
		}
	}else{
		echo "Invalid email";
	}

?>