<!DOCTYPE html>
<html>
<head>
	<title>Admin | View Feedback</title>
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                                crossorigin="anonymous">
	<?php require ('../Database/connect.php'); ?>
	<!--<style type="text/css">
		body,html{
			background-color: #30343F;
		}
		#detail{
			width: 80%;
			height: 80%;
			position: relative;
			margin: 6% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 5px;
			background-color: #E4D9FF;
		}

		#detail table,td,tr,th{
			padding: 10px;
		}
	</style>-->

	<script>
		function goBack() {		window.history.back();		}
	</script>
	
</head>
<body class="bg-dark text-light"> 
<div id="container" style="padding:20px;">
    <div class="row mx-2 my-3">
        <div class="col">
            <h1>Details of feedback</h1>
        </div>
    </div>
    <hr style="border: 1px solid white;">
		<?php
			if(isset($_GET['pageset']))
			{
				$id = $_GET['id'];

				$details = mysqli_query($con,"select * from feedback where FeedbackID = $id");

				$detail = mysqli_fetch_assoc($details);
				?>
				<div class="row mx-2 my-3"><div class="col">
				Feedback ID : 
				</div><div class="col">
				<?php echo $detail['FeedbackID'];?></td>
				</div></div><div class="row mx-2 my-3"><div class="col">
				User ID : 
				</div><div class="col">
				<?php echo $detail['userID'];?>
				</div></div><div class="row mx-2 my-3"><div class="col">
						<?php
							$idddd = $detail['userID'];
							$query = "select * from user where userID = $idddd";

							$result = mysqli_query($con, $query);
							$dd = mysqli_fetch_assoc($result);
						?>
				User Name :  
				</div><div class="col">
				<?php echo $dd['userName']?>
				</div></div><div class="row mx-2 my-3"><div class="col">
				Rating : 
				</div><div class="col">
				<?php echo $detail['rating']." star";?>
				</div></div><div class="row mx-2 my-3"><div class="col">
				Category : 
				</div><div class="col">
				<?php echo $detail['category'];?>
				</div></div><div class="row mx-2 my-3"><div class="col">
				Comment : 
				</div><div class="col">
				<?php echo $detail['comment'];?>
				</div></div><div class="row mx-2 my-3"><div class="col">
				<button onclick="goBack();" class="btn btn-primary m-auto" style="float:right;">Go Back</button>
				</div>
				<?php
			}
		?>
		
	</div>


</body>
</html>


