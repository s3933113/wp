<?php
$servername = "talsprddb02.int.its.rmit.edu.au";
$username = "s3933113"; 
$password = "Peter021040"; 
$dbname = "s3933113";  
$port = 3306;  


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
