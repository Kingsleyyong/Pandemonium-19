<?php 
session_start();
include("../database/connect.php");

//The different with $_POST and $_SERVER['REQUEST_METHOD'] == "POST" is:
//$_POST is sending the data
//$_SERVER['REQUEST_METHOD'] == "POST" is sending the method.
//Note that $_SERVER['REQUEST_METHOD'] == "POST" can submit if there dont have any data
//inside in it.
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$userEmail = $_POST['email'];
	$password = $_POST['password'];

	if( !empty($password) && !empty($userEmail)){
		$query = "select * from user where userEmail = '$userEmail'";
		$result = mysqli_query($con,$query);
						
		//if result is succesful
		if($result) {
			if($result && mysqli_num_rows($result)==1){
				$user_data = mysqli_fetch_assoc($result);

				if($user_data['userPassword'] === $password){
                    if($user_data['userType'] === "User"){
						$_SESSION['userID'] = $user_data['userID'];
						header("Location: ../Index Page/main.php");
						die;
					}
					else if($user_data['userType'] === "Admin"){
						$_SESSION['userID'] = $user_data['userID'];
						header("Location: ../admin/home.php");
						die;
					}
				}
			}
			else{
?>
<script type="text/javascript">
alert("Invalid user name or password!");
</script>
<?php
	header("refresh: 0.2;url = SignInUp_UI.php");
			}				
		}						
	}
} 
?>