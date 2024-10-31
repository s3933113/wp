<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<!-- Welcome Banner (Success Alert) -->
<?php if (isset($_SESSION['username'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center mb-0" role="alert">
        Login successful! Welcome, <?= htmlspecialchars($_SESSION['username']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Hero Section -->
<main>
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column for Carousel Image -->
                <div class="col-md-6 text-center">
                    <div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
                        
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/cat4.jpeg" class="carousel-img" alt="Pet Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images/cat1.jpeg" class="carousel-img" alt="Pet Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images/cat3.jpeg" class="carousel-img" alt="Pet Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="images/dog3.jpeg" class="carousel-img" alt="Pet Image 4">
                            </div>
                        </div>
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
                    <h2 class="display-5 custom-subtitle ps-5">WELCOME TO PET ADOPTION</h2>
                </div>
            </div>
        </div>
    </section>
</main>
