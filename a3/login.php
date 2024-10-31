<?php
$title = "Login";
include('includes/header.inc');
?>
<h1><?= $title ?></h1>
<?php
include('includes/nav.inc');
?>
<form action="process_login.php" method="post">
    <div class="mb-3 mt-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control w-50">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control w-50">
    </div>
    <div class="mb-3">
        <input type="submit" value="Login" class="btn btn-primary">
    </div>
</form>
</form>
<?php
include('includes/footer.inc');
?>