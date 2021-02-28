<!DOCTYPE html>
<html>
<head>
	<title>Admin | View User Detail</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<?php require ('../Database/connect.php'); ?>
	<script>
		    function goBack() {		window.history.back();		}
	</script>
</head>
<body class="bg-dark text-light" style="padding:20px;">
	<div class="row mx-2 my-3">
        <div class="col">
            <h1>User Details</h1>
        </div>
    </div>
	<hr style="border: 1px solid white;">
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
		<button onclick="goBack();" class="btn btn-primary m-auto" style="float:right;">Go Back</button>
	</div>
</body>
</html>