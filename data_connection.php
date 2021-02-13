<?php


$conn = mysqli_connect("localhost", "root", "", "contact_us");// fill out database name
if ($conn -> connect_error)
{
    die("Connection die: " . $conn -> connect_error);
}
else
{
    echo "Connection Successful";
}
?>