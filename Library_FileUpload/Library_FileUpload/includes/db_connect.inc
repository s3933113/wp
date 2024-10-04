<?php
//Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s123456";
    $password = "your password";
    $dbname = "s123456";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
