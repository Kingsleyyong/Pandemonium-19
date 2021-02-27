<?php
session_start();

	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Detail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row my-3">
            <div class="col">
			<?php
			if(isset($_GET['pageset']))
			{
				$id = $_GET['id'];

				$details = mysqli_query($con,"select * from user where userID = $id");

				$detail = mysqli_fetch_assoc($details);
				?>
				<div class="row my-3">
					<div class="col">
						ID: 
					</div>
					<div class="col">
						<?php echo $detail['userID'];?>
					</div>
        		</div>
				<div class="row my-3">
					<div class="col">
						User Name: 
					</div>
					<div class="col">
						<?php echo $detail['userName'];?>
					</div>
        		</div>
				<div class="row my-3">
					<div class="col">
						Email : 
					</div>
					<div class="col">
						<?php echo $detail['userEmail'];?>
					</div>
				</div>
				<div class="row my-3">
					<div class="col">
						Password : 
					</div>
					<div class="col">
						<?php echo $detail['userPassword'];?>
					</div>
				</div>
				<div class="row my-3">
					<div class="col">
						Role ( Admin / User ) : 
					</div>
					<div class="col">
						<?php echo $detail['userType'];?>
					</div>
				</div>
				<?php
			}
		?>
		
	</div>

</body>
</html>