<?php include('includes/header.inc'); ?>
<main class="login-page">
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        <p><a href="register.php">Don't have an account? Register here</a></p>
    </div>
</main>
<?php include('includes/footer.inc'); ?>
