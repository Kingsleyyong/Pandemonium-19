<?php


$conn = mysqli_connect("localhost", "root", "", "iwp_project");// fill out database name
if ($conn -> connect_error)
{
    die("Connection die: " . $conn -> connect_error);
}
?>