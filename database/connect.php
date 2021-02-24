<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "iwp_project";

//to connect
if(!$con  = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed to connect");
}