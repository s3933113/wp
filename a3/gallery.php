<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="page2">
    <section class="intro-section text-center mt-5">
        <h2 class="intro-title">Discover Pets Victoria</h2>
        <p>
            For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.
        </p>

        <!-- Dropdown form select below the paragraph -->
        <div class="container mb-4">
            <select class="form-select w-50 mx-auto" aria-label="Select a pet type" id="petTypeSelect" onchange="filterPets()">
                <option value="all" selected>Show all pets</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
        </div>
    </section>

    <section class="pets-gallery" id="petsGallery">
        <?php
        // Connect to the database
        include('includes/db_connect.inc');

        // Retrieve all pets from the database
        $result = $conn->query("SELECT petid, petname, type, image FROM pets");

        if ($result->num_rows > 0) {
            // Loop through each pet and display it
            while ($row = $result->fetch_assoc()) {
                // Add a data-type attribute to each pet card based on the pet's type
                echo '<div class="pet-card" data-type="' . strtolower($row["type"]) . '">';
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

<script>
    function filterPets() {
        const selectedType = document.getElementById("petTypeSelect").value;
        const petCards = document.querySelectorAll(".pet-card");

        petCards.forEach(card => {
            if (selectedType === "all" || card.getAttribute("data-type") === selectedType) {
                card.style.display = "block"; // Show the pet card
            } else {
                card.style.display = "none"; // Hide the pet card
            }
        });
    }
</script>

<?php include('includes/footer.inc'); ?>
