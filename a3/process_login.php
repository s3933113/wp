<?php
session_start();
include('includes/db_connect.inc');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username exists
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start user session and store user data
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php?message=login_done");
            exit();
        } else {
            // Incorrect password
            header("Location: login.php?message=login_error");
            exit();
        }
    } else {
        // Username not found
        header("Location: login.php?message=login_error");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
