<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<section class="intro-section text-start mt-5" style="padding: 20px; min-height: 60vh;">
    <h1 class="intro-title">Register</h1>

    <!-- Feedback Messages -->
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-dismissible fade show text-center <?php echo ($_GET['message'] == 'register_success') ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php
                switch ($_GET['message']) {
                    case 'username_taken':
                        echo "Username is already taken.";
                        break;
                    case 'register_success':
                        echo "Registration successful! Please log in.";
                        break;
                    case 'register_failed':
                        echo "Registration failed. Please try again.";
                        break;
                    case 'empty_fields':
                        echo "Please fill in all fields.";
                        break;
                }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Register Form aligned to the left -->
    <form action="process_register.php" method="post" class="mt-3 w-50">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success custom-btn">Sign up</button>
        </div>
    </form>
</section>

<?php include('includes/footer.inc'); ?>
