<?php
	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Product Management</title>
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
		$itemid = $_GET['id'];
		mysqli_query($con, "DELETE FROM item WHERE itemID='$itemid'") or die('sorry, no query');
		?>
		<script>
			alert("Record deleted!");
		</script>
		<?php
		header("refresh:0.5; url= manageProduct.php");
	}
	?>

</head>

<body class="bg-dark text-light">
	<form method="get">
	<div class = "user-container" style="margin:1%;">
		<h1 class="m-3">Product Management</h1>
		<table class="table">
			<tr>
				<th scope="col" class="text-center">Item ID</th>
				<th scope="col" class="text-center">Item Name</th>
				<th scope="col" class="text-center">Item Price</th>
				<th scope="col" class="text-center">Item Description</th>
                <th scope="col" class="text-center">Item Colour</th>
                <th scope="col" class="text-center">Item Size</th>
                <th scope="col" class="text-center">Stock Number</th>
				<th scope="col" class="text-center" colspan="2">Option</th>
			</tr>
			<?php 

			$result = mysqli_query($con,"select * from item");
			$numRow = mysqli_num_rows($result); //counting number of rows.

			while($row = mysqli_fetch_assoc($result))
			{
				$itemID = $row['itemID'];
			?>
			<tr>
				<td class="text-center"><?php echo $row['itemID']?></td>
				<td class="text-center"><?php echo $row['itemName']?></td>
				<td class="text-center"><?php echo $row['itemPrice']?></td>
				<td class="text-center"><?php echo $row['itemDescription']?></td>
                <td class="text-center"><?php echo $row['itemColour']?></td>
                <td class="text-center"><?php echo $row['itemSize']?></td>
                <td class="text-center"><?php echo $row['stockNumber']?></td>
				<td class="text-center"><a href="manageProduct_edit.php?id=<?php echo $itemID;?>&pageedit=true">Edit Details</a></td>
				<td class="text-center"><a href="manageProduct.php?pagedelete=true&id=<?php echo $itemID;?>" onclick="return confirmation()" style="color: red;">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<footer style="color: white;">Total record found : <?php echo $numRow?></footer>
		<input type="button" value="Add Item" class="btn btn-primary" onclick="location.href='manageProduct_add.php'">
	</div>
	</form>
</body>
</html>