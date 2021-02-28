<!DOCTYPE html>
<html>
<head>
	<title>Admin | View Feedback</title>
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                                crossorigin="anonymous">
	<?php require ('../Database/connect.php'); ?>
	<style type="text/css">
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
	</style>

	<script>
		function goBack() {		window.history.back();		}
	</script>
	
</head>
<body>
	<div id="detail">
		<?php
			if(isset($_GET['pageset']))
			{
				$id = $_GET['id'];

				$details = mysqli_query($con,"select * from feedback where FeedbackID = $id");

				$detail = mysqli_fetch_assoc($details);
				?>
				<table>
					<tr>
						<th colspan="2">Feedback Detail</th>
					</tr>
					<tr>
						<td>Feedback ID : </td>
						<td><?php echo $detail['FeedbackID'];?></td>
					</tr>
					<tr>
						<td>User ID : </td>
						<td><?php echo $detail['userID'];?></td>
					</tr>
					<tr>
						<?php
							$idddd = $detail['userID'];
							$query = "select * from user where userID = $idddd";

							$result = mysqli_query($con, $query);
							$dd = mysqli_fetch_assoc($result);
						?>
						<td>User Name :  </td>
						<td><?php echo $dd['userName']?></td>
					</tr>
					<tr>
						<td>rating : </td>
						<td><?php echo $detail['rating']." star";?></td>
					</tr>
					<tr>
						<td>Category : </td>
						<td><?php echo $detail['category'];?></td>
					</tr>
					<tr>
						<td>Comment : </td>
						<td><?php echo $detail['comment'];?></td>
					</tr>
					<tr>
					<td><button onclick="goBack();" class="btn btn-primary m-auto">Go Back</button></td>
					</tr>
				</table>
				<?php
			}
		?>
		
	</div>


</body>
</html>


