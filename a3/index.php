<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<?php if (isset($_GET['message']) && $_GET['message'] == 'login_done'): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
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
<main class="details-page" style="padding: 20px; min-height: 80vh;">
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column for Carousel -->
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <?php
                        include('includes/db_connect.inc');
                        $result = $conn->query("SELECT image FROM pets ORDER BY petid DESC LIMIT 4");
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
                    <div class="carousel-inner" style="width: 100%; max-width: 500px; height: 300px; overflow: hidden;">
                        <?php
                        $result->data_seek(0); 
                        $active = true;
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
            <div class="col-12 col-md-6 text-start mt-4 mt-md-0">
                <h1 class="display-6 display-md-5 custom-hero ps-3 ps-md-4">PETS VICTORIA</h1>
                <h2 class="h4 h-md-3 custom-subtitle ps-3 ps-md-4">WELCOME TO PET ADOPTION</h2>
            </div>
        </div>
    </div>
</section>

<section class="intro-section bg-white py-5 w-100">
    <form action="search.php" method="get" class="row justify-content-center gx-2">
        <!-- Search Keyword Input -->
        <div class="col-12 col-md-5 mb-2 mb-md-0">
            <input type="text" name="keyword" class="form-control form-control-lg" placeholder="I am looking for ...">
        </div>

        <!-- Pet Type Select Dropdown -->
        <div class="col-6 col-md-3 mb-2 mb-md-0">
            <select name="petType" class="form-select form-select-lg">
                <option value="" selected>Select your pet type</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
        </div>

        <!-- Search Button -->
        <div class="col-6 col-md-2">
            <button type="submit" class="btn btn-success btn-lg w-100">Search</button>
        </div>
    </form>

    <!-- Left-aligned title and paragraph without centering -->
    <div class="text-start mt-4">
        <div class="px-3 px-md-5">
            <h2 class="display-6 text-dark">Discover Pets Victoria</h2>
            <p class="lead text-secondary">
                Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
            </p>
        </div>
    </div>
</section>
</main>

<?php include('includes/footer.inc'); ?>
