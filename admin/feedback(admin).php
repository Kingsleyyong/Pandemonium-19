<!DOCTYPE html>
<html>
<head>
	<title>Admin | Feedback</title>
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<?php require ('../Database/connect.php'); ?>

	<style type="text/css">
		body,html{
			background-color: #30343F;		
		}

		.feedback-container table,tr,th,td{
			border: 1px solid black;
			border-collapse: collapse;
			padding: 10px;
			border-radius: 10px;
		}

		.feedback-container table{
			position: relative;
			margin: 2% auto;
			border-color: #30343F;
			padding: 10px;
			background-color: #E4D9FF;
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function confirmation()
		{
			var confirmm = confirm("Are you sure you want to delete record?");
			if(confirmm)
			{
				return true;
			}
			else
			{
				event.stopPropagation(); 
				event.preventDefault();
			}
		}	
	</script>

	<!-- NAV UI Import here -->
    <?php require("adminNav.php"); ?> 

	<!-- for deleting user -->
	<?php 
	if(isset($_GET['pagedelete']))
	{
		$id = $_GET['id'];

		// if fail to delete record.
		if($deleteResult = mysqli_query($con, "delete from feedback where FeedbackID = $id"))
		{
			?>
			<script type="text/javascript">
			alert("You have successfull deleted a record");
			</script>
		<?php
		}
		else
		{
			echo "fail to delete record";
		}
		
		header("refresh:0.5; url= feedback(admin).php");
	}
	?>
	
</head>
<body class="bg-dark">
	<div class = "feedback-container">
		<h1 style="font-weight: bold; color: white; margin-left: 2%">Feedback</h1>
		<table>
			<tr>
				<th>Feedback ID</th>
                <th>User ID</th>
				<th>Rating</th>
				<th>Category</th>
				<th>Comment</th>
				<th colspan="2">Option</th>
			</tr>
			<?php 

			$result = mysqli_query($con,"select * from feedback") or die("error connecting");
			$numRow = mysqli_num_rows($result); //counting number of rows.

			while($row = mysqli_fetch_assoc($result))
			{
				$fbID = $row['FeedbackID'];
			?>
			<tr>
				<td><?php echo $row['FeedbackID']?></td>
				<td><?php echo $row['userID']?></td>
				<td><?php echo $row['rating']?></td>
				<td><?php echo $row['category']?></td>
                <td><?php echo $row['comment']?></td>
				<td><a href="feedback(admin)_detail.php?id=<?php echo $fbID;?>&pageset=true">View Details</a></td>
				<td><a href="?id=<?php echo $fbID;?>&pagedelete" onclick="confirmation()" style="color: red;">Delete</a></td>
			</tr>
			<?php
			}
			?>
			<div style="color: white; font-size: 1.5em; margin-left:2%">Total record found : <?php echo $numRow?></div>
		</table>
	</div>
</body>
</html>