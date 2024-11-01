<?php include('includes/header.inc'); ?>

<?php include('includes/nav.inc'); ?>



<?php if (isset($_GET['message']) && $_GET['message'] == 'login_done'): ?>
    <div class="alert alert-success alert-dismissible fade show text-center " role="alert">
        Login successful! Welcome,
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (isset($_GET['message']) && $_GET['message'] == 'login_error'): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        Incorrect username or password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif (isset($_GET['message']) && $_GET['message'] == 'logout_success'): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        Logout done!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (isset($_GET['message']) && $_GET['message'] == 'delete_success'): ?>
    <div class="alert alert-dark alert-dismissible fade show text-center" role="alert">
        Pet deleted successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>




<!-- Hero Section -->
<main>
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column for Carousel -->
            <div class="col-md-6 d-flex justify-content-center">
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <?php
                        include('includes/db_connect.inc');

                        // Fetch the latest 4 images from the database
                        $result = $conn->query("SELECT image FROM pets ORDER BY petid DESC LIMIT 4");

                        // Generate indicators dynamically
                        $index = 0;
                        while ($index < $result->num_rows) {
                            echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $index . '"';
                            echo $index === 0 ? ' class="active"' : '';
                            echo ' aria-label="Slide ' . ($index + 1) . '"></button>';
                            $index++;
                        }
                        ?>
                    </div>
               <!-- Carousel Inner with Locked Display Area -->
               <div class="carousel-inner" style="width: 100%; max-width: 500px; height: 300px; overflow: hidden; margin: 0 auto;">
                  <?php
                 // Reset result pointer and initialize active status
                  $result->data_seek(0); // Reset to the first row
                  $active = true;

              // Fetch and display each image in the carousel
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                  echo '<img src="images/' . htmlspecialchars($row['image']) . '" class="d-block w-100" style="height: 100%; object-fit: cover;" alt="Pet Image">';
                  echo '</div>';
        $active = false;
    }

    $conn->close();
    ?>
</div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Right Column for Text -->
            <div class="col-md-6 text-start">
                <h1 class="display-5 custom-hero ps-5">PETS VICTORIA</h1>
                <h2 class="display-6 custom-subtitle ps-5">WELCOME TO PET ADOPTION</h2>
            </div>
        </div>
    </div>
</section>



<section class="intro-section bg-white py-5 w-100">
    <form action="search.php" method="get" class="input-group">
        <!-- Search Keyword Input -->
        <div class="col-md-7 ps-5 pe-3">
            <input type="text" name="keyword" class="form-control-sm" placeholder="I am looking for ...">
        </div>
        
        <!-- Pet Type Select Dropdown -->
        <div class="col-md-3 pe-2">
            <select name="petType" class="form-select-lg  w-100">
                <option value="" selected>Select your pet type</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
        </div>
        
        <!-- Search Button -->
        <div class="col-md-2 pe-5">
            <button type="submit" class="btn btn-success w-75">Search</button>
        </div>
    </form>

        <!-- Left-aligned title and paragraph without centering -->
        <div class="text-start">
        <div class="ps-5">
            <h2 class="display-6 mt-4 text-dark">Discover Pets Victoria</h2>
            <p class="lead text-secondary text-start">
    Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
</p>
        </div>
    </div>
</section>



</main>

<?php include('includes/footer.inc'); ?>
