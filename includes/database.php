<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "fundamentum_db";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);


}


?>

