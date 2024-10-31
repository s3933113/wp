<?php
session_start();


// Simulated credentials for testing
$correctUsername = "s3933113";
$correctPassword = "Peter021040";

// Retrieve form inputs
$username = $_POST['username'];
$password = $_POST['password'];

// Check credentials
if ($username === $correctUsername && $password === $correctPassword) {
    $_SESSION['username'] = $username;
    $_SESSION['alert_message'] = "Login successful!";
$_SESSION['alert_type'] = "success"; // Use "danger" for errors, etc.
header("Location: index.php?message=login_done");
exit();
    
    
    
} else {
    // Redirect to index with an error parameter for incorrect login
    header("Location: index.php?message=login_error");
    exit();
}
?>
