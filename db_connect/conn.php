<?php 

$host = "localhost";
$username = "root";
$password = "YourFavouritePassword";
$database = "testDB";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn)
{
    die('Connection Failed: ' . mysqli_connect_error()); 
}
?>
