<?php
// Start session if it hasn't started already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get the current page for active link styling
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-sm navbar-custom navbar-dark rounded">
    <div class="container">
        <!-- Logo on the left -->
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Logo" style="width: 30px;" class="d-inline-block align-text-top">
        </a>
        
        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'index.php') ? 'text-white' : 'text-white-50' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'pets.php') ? 'text-white' : 'text-white-50' ?>" href="pets.php">Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'gallery.php') ? 'text-white' : 'text-white-50' ?>" href="gallery.php">Gallery</a>
                </li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'add.php') ? 'text-white' : 'text-white-50' ?>" href="add.php">Add a Pet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'register.php') ? 'text-white' : 'text-white-50' ?>" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'login.php') ? 'text-white' : 'text-white-50' ?>" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Search bar on the right -->
            <form class="d-flex" action="search.php" method="get">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search" name="query">
             <button class="btn p-0 border-0 bg-transparent" type="submit">
               <img src="images/searchicon.png" alt="Search Icon" style="width: 16px;">
    </button>
</form>
            </form>
        </div>
    </div>
</nav>
