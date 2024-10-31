<?php include('includes/header.inc'); ?>

<?php include('includes/nav.inc'); ?>



<?php if (isset($_SESSION['username'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center mb-0" role="alert">
        Login successful! Welcome, <?= htmlspecialchars($_SESSION['username']); ?>.
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

<!-- Hero Section -->
<main>
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- คอลัมน์ซ้ายสำหรับรูปภาพ -->
            <div class="col-md-6 text-center">
                <!-- Carousel -->
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
                            <img src="images/dog3.jpeg" class="carousel-img" alt="Pet Image 3">
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

            
            <!-- คอลัมน์ขวาสำหรับข้อความ -->
            <div class="col-md-6 text-start">
            <h1 class="display-5 custom-hero ps-5">PETS VICTORIA</h1>
            <h2 class="display-5 custom-subtitle ps-5">WELCOME TO PET ADOPTION</h2>
            </div>
        </div>
    </div>
</section>



    <!-- Introduction Section with Search -->
    <section class="intro-section bg-white py-5 w-100">
    <div class="input-group">
    <div class="col-md-7 ps-5 pe-3 ">
        <input type="text" class="form-control-sm " placeholder="I am looking for ...">
    </div>
    <div class="col-md-3 pe-2">
        <select class="form-select-lg w-100"  >
            <option selected > Select your pet type</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="col-md-2 pe-5">
    <button class="btn btn-success custom-btn w-75">Search</button>

    </div>
</div>




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
