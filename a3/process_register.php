<?php
include('includes/db_connect.inc'); // Database connection

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate that the fields are not empty
    if (!empty($username) && !empty($password)) {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Username already exists
            header("Location: register.php?message=username_taken");
            exit();
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful, redirect to index.php
                header("Location: index.php?message=register_success");
                exit();
            } else {
                // Error occurred during registration
                header("Location: register.php?message=register_failed");
                exit();
            }
        }

        $stmt->close();
    } else {
        // Redirect back if fields are empty
        header("Location: register.php?message=empty_fields");
        exit();
    }
}

$conn->close();
?>
