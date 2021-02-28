<?php

session_start();

if(isset($_SESSION['userID']))
{
	unset($_SESSION['userID']);
}

header("Location: SignInUp.php");
die;

?>