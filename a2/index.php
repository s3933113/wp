<?php include('includes/header.inc'); ?>

<header>
    <div class="header-container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <select class="dropdown" onchange="location = this.value;">
            <option>Select an Option...</option>
            <option value="index.php">Home</option>
            <option value="pets.php">Pets</option>
            <option value="add.php">Add a pet</option>
            <option value="gallery.php">Gallery</option>
        </select>
        <input type="text" placeholder="Search" class="search-bar">
        <img src="images/searchicon.png" alt="icon" class="icon">
    </div>
</header>

<main>
    <section class="hero-section">
        <div class="text-container">
            <h1 class="title">PETS VICTORIA</h1>
            <h2 class="subtitle">WELCOME TO PET ADOPTION</h2>
        </div>
        <img src="images/main.jpg" alt="Puppy and Kitten" class="image">
    </section>
</main>

<?php include('includes/footer.inc'); ?>
