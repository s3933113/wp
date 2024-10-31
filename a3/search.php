<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="page2 mt-5">
    <div class="container">
        <h1 class="text-center">Search Results</h1>

        <?php
        // Connect to the database
        include('includes/db_connect.inc');

        // Initialize search filters
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $petType = isset($_GET['petType']) ? trim($_GET['petType']) : '';

        // Prepare the SQL query with dynamic WHERE clauses
        $sql = "SELECT petid, petname, type, description, age, location, image FROM pets WHERE 1=1";
        $params = [];
        $types = '';

        // Add keyword filter if provided
        if ($keyword) {
            $sql .= " AND (petname LIKE ? OR description LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
            $types .= 'ss';
        }

        // Add pet type filter if provided
        if ($petType) {
            $sql .= " AND type = ?";
            $params[] = $petType;
            $types .= 's';
        }

        // Prepare the statement
        $stmt = $conn->prepare($sql);
        if ($types) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Display results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container mt-4 p-3 border rounded'>";
                echo "    <div class='row g-3 align-items-start'>";

                // Image section on the left with fixed size
                echo "        <div class='col-md-4 d-flex justify-content-center'>";
                echo "            <img src='images/" . $row['image'] . "' class='img-fluid rounded' alt='" . htmlspecialchars($row['petname']) . "' style='width: 250px; height: 250px; object-fit: cover;'>";
                echo "        </div>";

                // Details section on the right
                echo "        <div class='col-md-8'>";
                echo "            <h3 class='text-dark'>" . ucwords(strtolower($row['petname'])) . "</h3>";
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

                echo "            <div class='mt-3'>";
                echo "                <a href='details.php?id=" . urlencode($row['petid']) . "' class='btn btn-info'>Discover More</a>";
                echo "            </div>";
                echo "        </div>";

                echo "    </div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-danger text-center'>No pets found matching your search.</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
