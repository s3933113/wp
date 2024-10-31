<?php
// กำหนดหน้าปัจจุบันให้เป็น active โดยเช็คด้วยชื่อไฟล์
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-sm navbar-custom navbar-dark rounded">
    <div class="container">
        <!-- โลโก้ด้านซ้าย -->
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Logo" style="width: 30px;" class="d-inline-block align-text-top">
        </a>
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
                    <a class="nav-link <?= ($currentPage == 'add.php') ? 'text-white' : 'text-white-50' ?>" href="add.php">Add a Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($currentPage == 'gallery.php') ? 'text-white' : 'text-white-50' ?>" href="gallery.php">Gallery</a>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'user.php') ? 'text-white' : 'text-white-50' ?>" href="user.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'login.php') ? 'text-white' : 'text-white-50' ?>" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- ช่องค้นหาทางด้านขวา -->
            <form class="d-flex" action="search.php" method="get">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn p-0 border-0 bg-transparent" type="submit">
                    <img src="images/searchicon.png" alt="Search Icon" style="width: 16px;">
                </button>
            </form>
        </div>
    </div>
</nav>
