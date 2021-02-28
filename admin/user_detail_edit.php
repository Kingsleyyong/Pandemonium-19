<?php
	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Edit User Detail</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php 
        if(isset($_POST['savebtn']))
        {
            $userid = $_GET['id'];
            $usrName = $_POST['user_name'];
            $usrEmail = $_POST['user_email'];
            $usrPass = $_POST['user_pass'];
            $usrRole = $_POST['user_role'];

            $result = mysqli_query($con,"UPDATE user SET userName = '$usrName', userEmail = '$usrEmail', 
                userPassword = '$usrPass', userType='$usrRole' where userID = '$userid'");
            if($result)
            {   ?>
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

</head>

<body class="bg-dark text-light" style="padding:20px;">
    <form method="post">
    <div class="row mx-2 my-3">
        <div class="col">
            <h1>Edit User Details</h1>
        </div>
    </div>
    <hr style="border: 1px solid white;">
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
    </form>
</body>
</html>