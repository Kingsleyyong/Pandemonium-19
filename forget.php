<?php
	session_start();
	include("connect.php");

	$email = $_POST['email'];

	$sql = "select * from user where  user_email = '$email' limit 1";
	if($result = mysqli_query($con,$sql))
	{
		$record = mysqli_fetch_assoc($result);
		$querrry = "update user set password = '123abc' where user_email = '$email'";
		if($resullt = mysqli_query($con,$querrry))
		{
			//sending an email
			require_once('PHPMailer/PHPMailerAutoload.php');
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

			header("Location: login&register.php");

		}else{
			echo "Error resetting";
		}
	}else{
		echo "Invalid email";
	}

?>