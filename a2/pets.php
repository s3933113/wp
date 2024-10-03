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

    <main class="page2">
        <section class="intro-section">
            <h1>Discover Pets Victoria</h1> <!-- Changed this to h2 for semantic hierarchy -->
            <p>
                Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need.
            </p>
        </section>

        <div class="content-section">
            <img src="images/pets.jpeg" alt="Pets" class="content-image">

            <table class="pet-table">
                <tr>
                    <th>Pet</th>
                    <th>Type</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
                <?php
                include('includes/db_connect.inc');

                $result = $conn->query("SELECT petid, petname, type, age, location FROM pets");

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a href='details.php?id=" . $row['petid'] . "'>" . $row['petname'] . "</a></td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['age'] . " months</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No pets found.</td></tr>";
                }

                $conn->close();
                ?>
            </table>
        </div>
    </main>
</div>

<?php include('includes/footer.inc'); ?>
