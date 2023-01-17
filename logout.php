<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "deshieditorsclone";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
    die("Connection failed due to" . mysqli_connect_error());
}
else
{
    //echo "Connection was successfully build<br>";
}

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>