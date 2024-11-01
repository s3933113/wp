<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>



<section class="intro-section text-start mt-5" style="padding: 20px; min-height: 60vh;">
    <h1 class="intro-title">Register</h1>
    
    <!-- Register Form aligned to the left -->
    <form action="process_login.php" method="post" class="mt-3 w-50">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success custom-btn">Sign up</button>
        </div>
    </form>
</section>




<?php
include('includes/footer.inc');
?>