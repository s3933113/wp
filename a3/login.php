<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<section class="intro-section mt-5" style="padding: 20px; min-height: 60vh;">
    <h1 class="intro-title">Login</h1>

    <!-- Login Form moved inside the section and padding adjusted -->
    <form action="process_login.php" method="post" class="mt-3">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control w-50">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control w-50">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success custom-btn d-inline">Login</button>
            <a href="register.php" class="btn btn-success custom-btn d-inline">Register</a>
        </div>
    </form>
</section>

<?php include('includes/footer.inc'); ?>
