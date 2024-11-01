<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="details-page" style="background-color: white; padding: 20px; ">
    <?php
    // Connect to the database
    include('includes/db_connect.inc');

    // Check if 'id' exists in the URL parameters and is numeric
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $petid = $_GET['id'];

        $stmt = $conn->prepare("SELECT petname, type, description, age, location, image FROM pets WHERE petid = ?");
        $stmt->bind_param("i", $petid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<div class='container mt-0 pt-0'>";
            echo "    <div class='row g-4 align-items-start'>";
            // Image section
            echo "    <div class='col-md-5 d-flex justify-content-start'>"; 
            echo "        <img src='images/" . $row['image'] . "' class='img-fluid rounded' alt='" . $row['petname'] . "' style='width: 100%; max-width: 400px;'>";
            echo "    </div>";

            // Details section
            echo "    <div class='col-md-7'>";
            echo "        <h2 class='text-dark'>" . ucwords(strtolower($row['petname'])) . "</h2>";
            echo "        <p class='text-muted'>" . $row['description'] . "</p>";
            echo "    </div>";
            echo "    </div>";

            // Icons section below
            echo "    <div class='row mt-3 text-start'>";
            echo "        <div class='col-auto d-flex align-items-center justify-content-start'>";
            echo "            <img src='images/clock-icon.png' alt='Age Icon' style='width: 20px; margin-right: 5px;'> <span>" . $row['age'] . " months</span>";
            echo "        </div>";
            echo "        <div class='col-auto d-flex align-items-center justify-content-start'>";
            echo "            <img src='images/paw-icon.png' alt='Type Icon' style='width: 20px; margin-right: 5px;'> <span>" . $row['type'] . "</span>";
            echo "        </div>";
            echo "        <div class='col-auto d-flex align-items-center justify-content-start'>";
            echo "            <img src='images/location-icon.png' alt='Location Icon' style='width: 20px; margin-right: 5px;'> <span>" . $row['location'] . "</span>";
            echo "        </div>";
            echo "    </div>";

            // Display Edit and Delete buttons if the user is logged in
            if (!empty($_SESSION['username'])) {
                echo "<div class='mt-3'>";
                echo "    <a href='edit.php?id=" . $petid . "' class='btn btn-primary me-2'>Edit</a>";
                echo "    <a href='delete.php?id=" . $petid . "' onclick='return confirm(\"Are you sure you want to delete this pet?\");' class='btn btn-danger'>Delete</a>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<p class='text-center text-danger'>No pet found with the specified ID.</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='text-center text-danger'>Invalid or missing pet ID.</p>";
    }

    $conn->close();
    ?>
</main>

<?php include('includes/footer.inc'); ?>
