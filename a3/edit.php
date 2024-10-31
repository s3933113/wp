<?php
include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

if (isset($_GET['id'])) {
    $petid = $_GET['id'];

    if (is_numeric($petid)) {
        $stmt = $conn->prepare("SELECT petname, type, description, age, location FROM pets WHERE petid = ?");
        $stmt->bind_param("i", $petid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>

<main class="edit-page">
    <h2>Edit Pet</h2>
    <form action="process_edit_pet.php" method="post">
        <input type="hidden" name="petid" value="<?= $petid; ?>">
        <div class="mb-3">
            <label for="petname" class="form-label">Pet Name</label>
            <input type="text" name="petname" id="petname" class="form-control" value="<?= htmlspecialchars($row['petname']); ?>">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="<?= htmlspecialchars($row['type']); ?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="<?= $row['age']; ?>">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="<?= htmlspecialchars($row['location']); ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"><?= htmlspecialchars($row['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</main>

<?php
        } else {
            echo "<p>No pet found.</p>";
        }
    }
}
?>

<?php include('includes/footer.inc'); ?>
