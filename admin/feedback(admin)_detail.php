<?php
session_start();
    require ('../Database/connect.php');
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Detail</title>
	<style type="text/css">
		body,html{
			background-color: #30343F;
		}
		#detail{
			width: 500px;
			height: 500px;
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

				</table>
				<?php
			}
		?>
		
	</div>


</body>
</html>


