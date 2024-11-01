<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="page3" style="padding: 20px; min-height: 80vh;">
    <div class="container">
        <h2 class="text-center mb-4">Add a Pet</h2>
        <p class="text-center mb-5">Please fill out the form below to add a new pet.</p>

        <form action="process_add.php" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
            <div class="mb-3">
                <label for="pet-name" class="form-label">Pet Name: <span class="text-danger">*</span></label>
                <input type="text" id="pet-name" name="pet-name" class="form-control" placeholder="Provide a name for the pet" required>
            </div>

            <div class="mb-3">
                <label for="pet-type" class="form-label">Type: <span class="text-danger">*</span></label>
                <select id="pet-type" name="pet-type" class="form-select" required>
                    <option value="">--Choose an option--</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="bird">Bird</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description: <span class="text-danger">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Describe the pet briefly" required></textarea>
            </div>

            <div class="mb-3">
                <label for="pet-image" class="form-label">Select an Image: <span class="text-danger">*</span></label>
                <small class="text-muted d-block mb-2">Max image size: 500px</small>
                <input type="file" id="pet-image" name="pet-image" accept="image/*" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image-caption" class="form-label">Image Caption: <span class="text-danger">*</span></label>
                <input type="text" id="image-caption" name="image-caption" class="form-control" placeholder="Describe the image in one word" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age (months): <span class="text-danger">*</span></label>
                <input type="number" id="age" name="age" class="form-control" placeholder="Age of a pet in months" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location: <span class="text-danger">*</span></label>
                <input type="text" id="location" name="location" class="form-control" placeholder="Location of the pet" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
</html>
