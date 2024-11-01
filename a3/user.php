<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="details-page" style="background-color: white; padding: 20px;">
    <div class="container mt-4">
        <?php
        // Connect to the database
        include('includes/db_connect.inc');

        // Fetch pet details from the database
        $stmt = $conn->prepare("SELECT petid, petname, type, description, age, location, image FROM pets ORDER BY petid DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container mt-4 p-3 border rounded'>";
                echo "    <div class='row g-3 align-items-start'>";

                // Image on the left
                echo "        <div class='col-md-4 d-flex justify-content-center'>";
                echo "            <img src='images/" . htmlspecialchars($row['image']) . "' class='img-fluid rounded' alt='" . htmlspecialchars($row['petname']) . "' style='width: 250px; height: 250px; object-fit: cover;'>";
                echo "        </div>";

                // Details on the right
                echo "        <div class='col-md-8'>";
                echo "            <h3 class='text-dark'>" . ucwords(strtolower(htmlspecialchars($row['petname']))) . "</h3>";
                echo "            <p class='text-muted'>" . htmlspecialchars($row['description']) . "</p>";

                // Additional Info Section
                echo "            <div class='row mt-2'>";
                echo "                <div class='col-auto d-flex align-items-center'>";
                echo "                    <img src='images/clock-icon.png' alt='Age Icon' style='width: 20px; margin-right: 5px;'> <span>" . htmlspecialchars($row['age']) . " months</span>";
                echo "                </div>";
                echo "                <div class='col-auto d-flex align-items-center'>";
                echo "                    <img src='images/paw-icon.png' alt='Type Icon' style='width: 20px; margin-right: 5px;'> <span>" . htmlspecialchars($row['type']) . "</span>";
                echo "                </div>";
                echo "                <div class='col-auto d-flex align-items-center'>";
                echo "                    <img src='images/location-icon.png' alt='Location Icon' style='width: 20px; margin-right: 5px;'> <span>" . htmlspecialchars($row['location']) . "</span>";
                echo "                </div>";
                echo "            </div>";

                // Edit and Delete buttons
                if (!empty($_SESSION['username'])) {
                    echo "            <div class='mt-3'>";
                    echo "                <a href='edit.php?id=" . urlencode($row['petid']) . "' class='btn btn-primary me-2'>Edit</a>";
                    echo "                <a href='delete.php?id=" . urlencode($row['petid']) . "' onclick='return confirm(\"Are you sure you want to delete this pet?\");' class='btn btn-danger'>Delete</a>";
                    echo "            </div>";
                }

                echo "        </div>"; // End right column
                echo "    </div>"; // End row
                echo "</div>"; // End card container
            }
        } else {
            echo "<p class='text-center text-danger'>No pets found.</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
