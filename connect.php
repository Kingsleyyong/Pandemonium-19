<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

//to connect
if(!$con  = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed to connect");
}