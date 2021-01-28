<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
}

header("Location: login&register.php");
die;