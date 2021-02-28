<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		#html,body{
			background: #30343F;
		}

		#feedback{
			width: 800px;
			height: 410px;
			position: relative;
			margin: 9% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 10px;
			background-color: #E4D9FF;
			text-align: center;
		} 
		.star-rating{
			font-size: 0;
			white-space: nowrap;
			display: block;
			width: 175px;
			height: 35px;
			overflow: hidden;
			position: relative;
			background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
			background-size: contain;
		}
		.star-rating i{
			opacity: 0;
			position: absolute;
			left: 0;
			top: 0;
			height: 100%;
			width: 20%;
			z-index: 1;
			background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
			background-size: contain;
		}
		.star-rating input {
		  -moz-appearance: none;
		  -webkit-appearance: none;
		  opacity: 0;
		  display: inline-block;
		  width: 20%;
		  height: 100%;
		  margin: 0;
		  padding: 0;
		  z-index: 2;
		  position: relative;
		  cursor: pointer;
		}
		.star-rating input:hover + i,
		.star-rating input:checked + i {
		  opacity: 1;
		}
		.star-rating i ~ i {
		  width: 40%;
		}
		.star-rating i ~ i ~ i {
		  width: 60%;
		}
		.star-rating i ~ i ~ i ~ i {
		  width: 80%;
		}
		.star-rating i ~ i ~ i ~ i ~ i {
		  width: 100%;
		}

		#type input{
			cursor: pointer;
		}
		textarea {
            color: white !important;
        }
	</style>
	<!-- NAV UI Import here -->
	<?php require("../Navigation Bar and Footer/navbar.php"); ?> 
</head>
<body class="bg-dark text-light">
	<h1 class="text-center my-3" style="text-shadow: rgb(255,255,153) 2px -1px 5px;">Feedback</h1>
	<p class="text-center">We would be much appreciate to have your feedback about our website in order to improve our website.</p>

	<form id="feedback-form" method="post" action="feedback.php">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<p class="text-center">How is your experience on our website? (Please rate)</p><br>
				<span class="star-rating mx-auto" width="200px">
					<input type="radio" name="rating" value="1" required><i></i>
					<input type="radio" name="rating" value="2"><i></i>
					<input type="radio" name="rating" value="3"><i></i>
					<input type="radio" name="rating" value="4"><i></i>
					<input type="radio" name="rating" value="5"><i></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col">
					<div class="container-fluid">
						<div class="row">
							<div class="col mt-4">
								<p class="text-center">Please select the category for your feedback:</p>
								<span class="mx-auto" style="display: block; width: 400px;">
									<input type="radio" name="feedback-category" id="suggestion" class="suggestion" value="suggestion" required>
									<label for="suggestion">Suggestion</label>
									<input type="radio" name="feedback-category" id="somethingWrong" class="somethingWrong" value="somethingWrong">
									<label for="somethingWrong">Something's wrong</label>
									<input type="radio" name="feedback-category" id="complement" class="complement" value="complement">
									<label for="complement">Complement</label>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="comment">Leave any suggestion below.</label><br>
								<textarea cols="80" name="comment" rows="5" class="form-control" placeholder="Enter text here. . ." style="margin-top: 10px;
									background: transparent; padding: 5px " required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<input type="submit" name="submit" class="btn btn-primary" value="Submit Feedback" >
							</div>
						</div>
					</div>	
				</form>
			</div>
		</div>
		<?php
			$userid = $user_data['userID'];
			if(isset($_POST['submit']))
			{
				$rating = $_POST['rating'];
				$type = $_POST['feedback-category'];
				$comment= $_POST['comment'];
	
				$query = "INSERT INTO feedback(rating,category,comment,userID) VALUES ('$rating','$type','$comment','$userid')";

				if($result = mysqli_query($con,$query))
				{
				?>
					<script>
						alert("Thank you for your feedback!!");
					</script>
				<?php
				}
				else{
					echo "Error inserting data";
				}
			}
        ?>
	</div>

	<!-- Footer UI Import Here -->
	<?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>