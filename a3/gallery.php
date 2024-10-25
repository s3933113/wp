<?php include('includes/header.inc'); ?>

<div class="wrapper">
    <header class="header-with-banner">
        <div class="logo-banner-container">
            <img src="images/logo.png" alt="Logo" class="logo">
            <h1 class="banner-title">PETS VICTORIA</h1> <!-- Main H1 for the page -->
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search" class="search-bar">
            <img src="images/searchicon.png" alt="Search Icon" class="icon">
        </div>
    </header>

    <?php include('includes/nav.inc'); ?>

    <main class="page2">
        <section class="intro-section">
            <h2>Pets Victoria has a lot to offer!</h2> <!-- Changed to H2 for subheading -->
            <p>For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
        </section>

        <section class="pets-gallery">
            <?php
            // Connect to the database
            include('includes/db_connect.inc');

            // Retrieve all pets from the database
            $result = $conn->query("SELECT petid, petname, image FROM pets");

            if ($result->num_rows > 0) {
                // Loop through each pet and display it
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="pet-card">';
                    echo '  <div class="pet-card-image">';
                    echo '      <img src="images/' . $row["image"] . '" alt="' . $row["petname"] . '">';
                    echo '      <div class="overlay">';
                    echo '          <a href="details.php?id=' . urlencode($row['petid']) . '"><span>DISCOVER MORE!</span></a>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '  <h3>' . $row["petname"] . '</h3>';
                    echo '</div>';
                }
            } else {
                echo "<p>No pets found in the gallery.</p>";
            }

            $conn->close();
            ?>
        </section>
    </main>
</div>

<?php include('includes/footer.inc'); ?>
