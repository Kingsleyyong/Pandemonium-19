<?php
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body,html{
			background-color: #30343F;
		}
		#edit{
			width: 600px;
			height: 300px;
			position: relative;
			margin: 6% auto;
			border: 1pt solid #30343F;
			border-radius: 10px;
			padding: 5px;
			background-color: #E4D9FF;
		}

        #edit form{
            text-align: center;
        }
        #edit form input{
            background: transparent;
            border: 1px dotted black;
        }

        #edit form input[type=submit]{
            background: red;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="edit">
        <?php 
            if(isset($_GET['pageedit']))
            {
                $userid = $_GET['id'];
                $result = mysqli_query($con,"select * from user where id = $userid");
                $details = mysqli_fetch_assoc($result);
                echo "<p>ID : ".$userid."</p>";
                ?>

                <form name="editUser" method="post" action="">
                    <p>User Name: <input type = "text" name = "user_name" size =50 value = "<?php echo $details['user_name']?>">
                    <p>Email : <input type ="email" name="user_email" size=50 value="<?php echo $details['user_email'];?>">
                    <p>Password : <input type = "text" name="user_pass" size=50 value="<?php echo $details['password'];?>">
                    <p>Role ( Admin / User ) : <input type = "text" name="user_role" size=5 value="<?php echo $details['type'];?>">
                    <p><input type="submit" name="savebtn" value="Update">
                </form> 
            <?php
            }
        ?>
    </div>
</body>
</html>

<?php 

if(isset($_POST['savebtn']))
{
    $usrName = $_POST['user_name'];
    $usrEmail = $_POST['user_email'];
    $usrPass = $_POST['user_pass'];
    $usrRole = $_POST['user_role'];

    $result = mysqli_query($con,"update user set user_name = '$usrName', user_email = '$usrEmail', password = '$usrPass', type='$usrRole' where id = '$userid'");
    if($result)
    {
        ?>
        <script type="text/javascript">
            alert("Succecfully updated");
        </script>
        <?php
    }
    else{
        echo "error updating";
    }

    header("refresh:0.5; url = user_management.php");

}

?>