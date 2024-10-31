<?php
include('includes/header.inc');
include('includes/nav.inc');

// Connect to the database
include('includes/db_connect.inc');

// Check if pet ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $petid = $_GET['id'];

    // Fetch pet data based on the pet ID
    $stmt = $conn->prepare("SELECT petname, type, description, age, location, image FROM pets WHERE petid = ?");
    $stmt->bind_param("i", $petid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        echo "<p class='text-danger text-center'>Pet not found.</p>";
        exit();
    }
    $stmt->close();
} else {
    echo "<p class='text-danger text-center'>No pet ID provided.</p>";
    exit();
}
?>

<main class="page3">
    <div class="container mt-4">
        <h2 class="text-center">Edit Pet</h2>

        <!-- Form with pre-filled data for editing -->
        <form action="process_edit.php?id=<?= $petid ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pet-name" class="form-label">Pet Name: <span class="required">*</span></label>
                <input type="text" id="pet-name" name="pet-name" class="form-control" value="<?= htmlspecialchars($pet['petname']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="pet-type" class="form-label">Type: <span class="required">*</span></label>
                <select id="pet-type" name="pet-type" class="form-select" required>
                    <option value="">--Choose an option--</option>
                    <option value="dog" <?= $pet['type'] == 'dog' ? 'selected' : '' ?>>Dog</option>
                    <option value="cat" <?= $pet['type'] == 'cat' ? 'selected' : '' ?>>Cat</option>
                    <option value="bird" <?= $pet['type'] == 'bird' ? 'selected' : '' ?>>Bird</option>
                    <option value="other" <?= $pet['type'] == 'other' ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description: <span class="required">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="4" required><?= htmlspecialchars($pet['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="pet-image" class="form-label">
                    Select a New Image (Optional): 
                    <small class="text-muted">Max image size: 500px</small>
                </label>
                <input type="file" id="pet-image" name="pet-image" accept="image/*" class="form-control">
                <small class="text-muted">Current Image: <?= htmlspecialchars($pet['image']) ?></small>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age (months): <span class="required">*</span></label>
                <input type="number" id="age" name="age" class="form-control" value="<?= htmlspecialchars($pet['age']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location: <span class="required">*</span></label>
                <input type="text" id="location" name="location" class="form-control" value="<?= htmlspecialchars($pet['location']) ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="details.php?id=<?= $petid ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
