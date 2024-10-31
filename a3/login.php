<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<section class="intro-section text-center mt-5">
        <h1 class="intro-title ">Login</h1>
        
    </section>
<form action="process_login.php" method="post">
    <div class="mb-3 mt-3 ps-5">
        <label for="username" class="form-label ">Username</label>
        <input type="text" name="username" id="username" class="form-control w-50">
    </div>
    <div class="mb-3 ps-5">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control w-50">
    </div>
    <div class="mb-3 ps-5">
    <button class="btn btn-success custom-btn ">Login</button>
    </div>
</form>
</form>
<?php
include('includes/footer.inc');
?>