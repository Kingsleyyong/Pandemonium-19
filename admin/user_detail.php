<?php
session_start();

	include("connect.php");
	include("function.php");

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
		#detailWrap{
			width: 380px;
			height: 300px;
			position: relative;
			margin: 6% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 5px;
			background-color: #E4D9FF;
		}

		#detailWrap table,td,tr,th{
			padding: 10px;
		}

	</style>
</head>
<body>
	<div id="detailWrap">
		<?php
			if(isset($_GET['pageset']))
			{
				$id = $_GET['id'];

				$details = mysqli_query($con,"select * from user where userID = $id");

				$detail = mysqli_fetch_assoc($details);
				?>
				<table>
					<tr>
						<th colspan="2">User Detail</th>
					</tr>
					<tr>
						<td>User ID : </td>
						<td><?php echo $detail['userID'];?></td>
					</tr>
					<tr>
						<td>User Name : </td>
						<td><?php echo $detail['userName'];?></td>
					</tr>
					<tr>
						<td>User Email : </td>
						<td><?php echo $detail['userEmail'];?></td>
					</tr>
					<tr>
						<td>Password : </td>
						<td><?php echo $detail['userPassword'];?></td>
					</tr>
					<tr>
						<td>User Role : </td>
						<td><?php echo $detail['userType'];?></td>
					</tr>

				</table>
				<?php
			}
		?>
		
	</div>

</body>
</html>