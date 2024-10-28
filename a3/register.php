<?php include('includes/header.inc'); ?>

<main class="register-page">
    <div class="register-container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
        <p><a href="login.php">Already have an account? Login here</a></p>
    </div>
</main>

<?php
// Process registration form submission
include('includes/db_connect.inc'); // Include database connection

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute query to insert the new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    // Check if registration is successful
    if ($stmt->execute()) {
        echo "<p>Registration successful! <a href='login.php'>Login here</a>.</p>";
    } else {
        echo "<p>Username already taken. Please choose another.</p>";
    }
    $stmt->close();
}

include('includes/footer.inc'); // Include footer for consistent layout
?>
