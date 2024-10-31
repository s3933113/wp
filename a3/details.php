<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="details-page" style="background-color: white; padding: 20px; ">
    <?php
    // Connect to the database
    include('includes/db_connect.inc');

    if (isset($_GET['id'])) {
        $petid = $_GET['id'];

        if (is_numeric($petid)) {
            $stmt = $conn->prepare("SELECT petname, type, description, age, location, image FROM pets WHERE petid = ?");
            $stmt->bind_param("i", $petid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo "<div class='container mt-0 pt-0'>"; // Removes any top margin and padding
                echo "    <div class='row g-4 align-items-start'>"; // Adjust align-items-start to align items to the top

                
                // Image section
                echo "    <div class='col-md-5 d-flex justify-content-start'>"; 
                echo "        <img src='images/" . $row['image'] . "' class='img-fluid rounded' alt='" . $row['petname'] . "' style='width: 100%; max-width: 400px;'>";
                echo "    </div>";


                // Details section
                echo "<div class='col-md-7'>";
                echo "    <h2 class='text-dark' style='font-weight: 500; margin-bottom: 0;'>" . ucwords(strtolower($row['petname'])) . "</h2>";
                echo "    <p class='text-muted' style='font-size: 1rem; font-weight: 300; margin-top: 0.5rem;'>" . $row['description'] . "</p>";
                echo "</div>";
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


                
                echo "</div>";
            } else {
                echo "<p class='text-center text-danger'>No pet found with the specified ID.</p>";
            }
        } else {
            echo "<p class='text-center text-danger'>Invalid pet ID.</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='text-center text-danger'>No pet ID provided.</p>";
    }

    $conn->close();
    ?>
</main>

<?php include('includes/footer.inc'); ?>
