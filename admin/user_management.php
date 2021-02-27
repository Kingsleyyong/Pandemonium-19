<?php
session_start();

	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--<style type="text/css">
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
			position: relative;
			margin: 7% auto;
			border-color: #30343F;
			padding: 10px;
			background-color: #E4D9FF;
			text-align: center;
		}
	</style>-->
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
</head>
<body class="bg-dark text-light">
	<h1 class="m-3">User Management</h1>
	<div class = "user-container">
		<table class="table">
			<tr>
				<th scope="col" class="text-center">ID</th>
				<th scope="col" class="text-center">Username</th>
				<th scope="col" class="text-center">Email</th>
				<th scope="col" class="text-center">Roles</th>
				<th scope="col" class="text-center" colspan="3">Option</th>
			</tr>
			<?php 

			$result = mysqli_query($con,"select * from user");
			$numRow = mysqli_num_rows($result); //counting number of rows.

			while($row = mysqli_fetch_assoc($result))
			{
				$userid = $row['userID'];
			?>
			<tr>
				<td class="text-center"><?php echo $row['userID']?></td>
				<td class="text-center"><?php echo $row['userName']?></td>
				<td class="text-center"><?php echo $row['userEmail']?></td>
				<td class="text-center"><?php echo $row['userType']?></td>
				<td class="text-center"><a href="user_detail.php?id=<?php echo $userid;?>&pageset=true">View Details</a></td>
				<td class="text-center"><a href="user_detail_edit.php?id=<?php echo $userid;?>&pageedit=true">Edit Details</a></td>
				<td class="text-center"><a href="?id=<?php echo $userid;?>&pagedelete=true" onclick="confirmation()" style="color: red;">Delete</a></td>
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

	// if fail to delete record.
	if($deleteResult = mysqli_query($con, "delete from user where userID = $id"))
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
	
	header("refresh:0.5; url= user_management.php" );
}
?>