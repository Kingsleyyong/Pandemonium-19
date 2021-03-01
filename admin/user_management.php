<?php
	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

	<!-- NAV UI Import here -->
    <?php require("adminNav.php"); ?> 

	<!-- for deleting user -->
	<?php 
	if(isset($_GET['pagedelete']))
	{
		$id = $_GET['id'];
<<<<<<< HEAD
		if($result = mysqli_query($con,"select * from cart where userID = $id"))
		{
			if($get_cartID = mysqli_fetch_assoc($result)) //get the cartid on the record table which is belongs to this userid.
			{
				$cartID = $get_cartID['cartID'];
				mysqli_query($con, "DELETE FROM feedback WHERE userID='$id'") or die('sorry, no query');
				mysqli_query($con, "DELETE FROM cartrecord WHERE cartID = '$cartID'");
				mysqli_query($con, "DELETE FROM cart WHERE userID='$id'") or die('sorry, no query');
				mysqli_query($con, "DELETE FROM user WHERE userID='$id'") or die('sorry, no query');
				?>
				<script>
					alert("Record deleted!");
				</script>
				<?php
				header("refresh:0.5; url= user_management.php");
			}
		}	
=======
		mysqli_query($con, "DELETE FROM user WHERE userID='$id'") or die('sorry, no query');
		?>
		<script>
			alert("Record deleted!");
		</script>
		<?php
		header("refresh:0.5; url= user_management.php");	
>>>>>>> 0152783e27e9a1920ff52324bf00f6036da72bd3
	}
	?>

</head>

<body class="bg-dark text-light">
	<form method="get">
	<div class = "user-container" style="margin:1%;">
		<h1 class="m-3">User Management</h1>
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
				<td class="text-center"><a href="user_management.php?pagedelete&id=<?php echo $userid;?>" onclick="return confirmation()" style="color: red;">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<footer style="color: white;">Total record found : <?php echo $numRow?></footer>
	</div>
	</form>
</body>
</html>