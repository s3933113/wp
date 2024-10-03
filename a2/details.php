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

    <main class="details-page" style="background-color: white; padding: 20px; min-height: 100vh;">
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

                    echo "<div class='details-container' style='background-color: white; padding: 40px; max-width: 800px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
                    echo "    <div class='pet-image-wrapper'>";
                    echo "        <img class='pet-image' src='images/" . $row['image'] . "' alt='" . $row['petname'] . "' style='max-width:100%; height:auto;'>";
                    echo "    </div>";

                    echo "    <div class='info-section'>";
                    echo "        <div class='info-block'>";
                    echo "            <img src='images/clock-icon.png' alt='Age Icon' class='info-icon'>";
                    echo "            <span>" . $row['age'] . " months</span>";
                    echo "        </div>";

                    echo "        <div class='info-block'>";
                    echo "            <img src='images/paw-icon.png' alt='Type Icon' class='info-icon'>";
                    echo "            <span>" . $row['type'] . "</span>";
                    echo "        </div>";

                    echo "        <div class='info-block'>";
                    echo "            <img src='images/location-icon.png' alt='Location Icon' class='info-icon'>";
                    echo "            <span>" . $row['location'] . "</span>";
                    echo "        </div>";
                    echo "    </div>";

                    echo "    <h1 class='pet-name'>" . ucwords(strtolower($row['petname'])) . "</h1>";
                    echo "    <p class='pet-description'>" . $row['description'] . "</p>";
                    echo "</div>";
                } else {
                    echo "<p>No pet found with the specified ID.</p>";
                }
            } else {
                echo "<p>Invalid pet ID.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No pet ID provided.</p>";
        }

        $conn->close();
        ?>
    </main>
</div>

<?php include('includes/footer.inc'); ?>
