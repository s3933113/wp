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

    <?php include('includes/nav.inc'); ?>

    <main class="page3">
        <h1>Add a pet</h1>
        <p>You can add a new pet here</p>

        <form action="process_add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pet-name">Pet Name: <span class="required">*</span></label>
                <input type="text" id="pet-name" name="pet-name" placeholder="Provide a name for the pet" required>
            </div>

            <div class="form-group">
                <label for="pet-type">Type: <span class="required">*</span></label>
                <select id="pet-type" name="pet-type" required>
                    <option value="">--Choose an option--</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="bird">Bird</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description: <span class="required">*</span></label>
                <textarea id="description" name="description" rows="4" placeholder="Describe the pet briefly" required></textarea>
            </div>

            <div class="form-group">
                <label for="pet-image" class="label-with-note">
                    Select an Image: <span class="required">*</span>
                    <small><span class="small">Max image size: 500px</span></small>
                </label>
                <input type="file" id="pet-image" name="pet-image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="image-caption">Image Caption: <span class="required">*</span></label>
                <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word" required>
            </div>

            <div class="form-group">
                <label for="age">Age (months): <span class="required">*</span></label>
                <input type="number" id="age" name="age" placeholder="Age of a pet in months" required>
            </div>

            <div class="form-group">
                <label for="location">Location: <span class="required">*</span></label>
                <input type="text" id="location" name="location" placeholder="Location of the pet" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Submit</button>
                <button type="reset" class="btn-clear">Clear</button>
            </div>
        </form>
    </main>
</div> <!-- Closing wrapper div -->

<?php include('includes/footer.inc'); ?> <!-- Correctly placed footer -->


</html> <!-- Close html only once at the very end -->
