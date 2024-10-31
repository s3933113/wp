<?php
session_start(); // Start session to check if the user is logged in

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if 'id' is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Connect to the database
    include('includes/db_connect.inc');
    
    // Sanitize the pet ID
    $petid = $_GET['id'];
    
    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM pets WHERE petid = ?");
    $stmt->bind_param("i", $petid);

    if ($stmt->execute()) {
        // On successful deletion, redirect to index or another page with a success message
        header("Location: index.php?message=delete_success");
    } else {
        // If deletion fails, show an error message
        echo "<p>Error: Unable to delete pet.</p>";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid pet ID provided.</p>";
}
?>
