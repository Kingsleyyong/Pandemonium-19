<?php
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
	<style type="text/css">
		body,html{
			background-color: #30343F;		
		}

		.user-container table,tr,th,td{
			border: 1px solid black;
			border-collapse: collapse;
			padding: 10px;
			border-radius: 10px;
		}

		.user-container table{
			width: 800px;
			height: 410px;
			position: relative;
			margin: 7% auto;
			border-color: #30343F;
			padding: 10px;
			background-color: #E4D9FF;
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function confirmation()
		{
			var confirmm = confirm("Do you want to delete this movie?");
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
</head>
<body>

	<div class = "user-container">
		<table>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Roles</th>
				<th colspan="3">Option</th>
			</tr>
			<?php 

			$result = mysqli_query($con,"select * from user");
			$numRow = mysqli_num_rows($result); //counting number of rows.

			while($row = mysqli_fetch_assoc($result))
			{
				$userid = $row['id'];
			?>
			<tr>
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['user_name']?></td>
				<td><?php echo $row['user_email']?></td>
				<td><?php echo $row['type']?></td>
				<td><a href="user_detail.php?id=<?php echo $userid;?>&pageset=true">View Details</a></td>
				<td><a href="user_detail_edit.php?id=<?php echo $userid;?>&pageedit=true">Edit Details</a></td>
				<td><a href="?id=<?php echo $userid;?>&pagedelete=true" onclick="confirmation()" style="color: red;">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<footer style="color: white;">Total record found : <?php echo $numRow?></footer>
	</div>
</body>
</html>

<!-- for deleting user -->
<?php 
if(isset($_GET['pagedelete']))
{
	$id = $_GET['id'];
	$deleteResult = mysqli_query($con, "delete from user where id = $id");

	// if fail to delete record.
	if(!$deleteResult)
	{
		echo "fail to delete record";
	}
	else
	{
		?>
			<script type="text/javascript">
				alert("You have successfull deleted a record");
			</script>
		<?php
	}
	
	header("Location: user_management.php");
}
?>