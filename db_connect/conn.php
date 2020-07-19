<?php 

$host = "localhost";
$username = "root";
$password = "Jetairways1";
$database = "testDB";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn)
{
    die('Connection Failed: ' . mysqli_connect_error()); 
}
?>