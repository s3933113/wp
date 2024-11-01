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

    <section class="container">
        <div class="row justify-content-center" id="petsGallery">
            <?php
            // Connect to the database
            include('includes/db_connect.inc');

            // Retrieve all pets from the database
            $result = $conn->query("SELECT petid, petname, type, image FROM pets");

            if ($result->num_rows > 0) {
                // Loop through each pet and display it
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-12 col-sm-6 col-md-4 mb-5 d-flex align-items-stretch">';
                    echo '  <div class="card shadow pet-card text-center border-0" data-type="' . strtolower($row["type"]) . '">';
                    echo '      <div class="position-relative overflow-hidden">';
                    echo '          <img src="images/' . $row["image"] . '" class="card-img-top img-fluid w-100" alt="' . $row["petname"] . '">';
                    echo '          <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5); color: white; opacity: 0; transition: opacity 0.3s;">';
                    echo '              <a href="details.php?id=' . urlencode($row['petid']) . '" class="text-white text-decoration-none">DISCOVER MORE!</a>';
                    echo '          </div>';
                    echo '      </div>';
                    echo '      <div class="card-body">';
                    echo '          <h5 class="card-title">' . $row["petname"] . '</h5>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No pets found in the gallery.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>
</main>

<script>
    function filterPets() {
        const selectedType = document.getElementById("petTypeSelect").value;
        const petCards = document.querySelectorAll(".pet-card");

        petCards.forEach(card => {
            card.style.display = (selectedType === "all" || card.getAttribute("data-type") === selectedType) ? "block" : "none";
        });
    }

    // Overlay hover effect
    document.querySelectorAll('.position-relative').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.querySelector('.overlay').style.opacity = '1';
        });
        card.addEventListener('mouseleave', () => {
            card.querySelector('.overlay').style.opacity = '0';
        });
    });
</script>

<?php include('includes/footer.inc'); ?>
