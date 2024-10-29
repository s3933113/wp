<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<?php include('includes/header.inc'); ?>

<div class="wrapper">
    <header class="header-with-banner">
        <div class="logo-banner-container">
            <img src="images/logo.png" alt="Logo" class="logo">
            <h1 class="banner-title">PETS VICTORIA</h1>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search" class="search-bar">
            <img src="images/searchicon.png" alt="Search Icon" class="icon">
        </div>
    </header>

    <?php include('includes/nav.inc'); ?> <!-- Include navigation -->

    <main>
        <!-- Hero Section, modified for dashboard welcome message -->
        <section class="hero-section">
            <div class="text-container">
                <h1 class="title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <h2 class="subtitle">You are now on the Pets Victoria Dashboard</h2>
                <p>Choose from the options below to manage pet information:</p>
            </div>
            <img src="images/main.jpg" alt="Puppy and Kitten" class="image">
        </section>

        <!-- Dashboard Navigation Section -->
        <section class="dashboard-actions" style="text-align: center; margin-top: 40px;">
            <nav>
                <ul class="dashboard-nav">
                    <li><a href="pets.php">View Pets</a></li>
                    <li><a href="add.php">Add a New Pet</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Link to log out -->
                </ul>
            </nav>
        </section>
    </main>
</div>

<?php include('includes/footer.inc'); ?>
