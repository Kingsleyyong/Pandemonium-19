<?php
session_start();

	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row my-3">
            <div class="col">
                <?php 
                if(isset($_GET['pageedit']))
                {
                    $userid = $_GET['id'];
                    $result = mysqli_query($con,"select * from user where userID = $userid");
                    $details = mysqli_fetch_assoc($result);
                    echo 'ID :</div> <div class="col">'.$userid."";
                ?>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                User Name: 
            </div>
            <div class="col">
                <input type = "text" name = "user_name" class="form-control" size =50 value = "<?php echo $details['userName']?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Email : 
            </div>
            <div class="col">
                <input type ="email" name="user_email" class="form-control" size=50 value="<?php echo $details['userEmail'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Password : 
            </div>
            <div class="col">
                <input type = "text" name="user_pass" class="form-control" size=50 value="<?php echo $details['userPassword'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Role ( Admin / User ) : 
            </div>
            <div class="col">
                <input type = "text" name="user_role" class="form-control" size=5 value="<?php echo $details['userType'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">

            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" name="savebtn" value="Update">
            </div>
        </div>
    </div>
    <?php
            }
        ?>
</body>
</html>

<?php 

if(isset($_POST['savebtn']))
{
    $usrName = $_POST['user_name'];
    $usrEmail = $_POST['user_email'];
    $usrPass = $_POST['user_pass'];
    $usrRole = $_POST['user_role'];

    $result = mysqli_query($con,"update user set userName = '$usrName', userEmail = '$usrEmail', userPassword = '$usrPass', userType='$usrRole' where userID = '$userid'");
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