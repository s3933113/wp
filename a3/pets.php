<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main class="page2">
    <section class="intro-section text-center mt-5">
        <h1 class="intro-title">Discover Pets Victoria</h1>
        <p class="lead text-secondary">
            Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
        </p>
    </section>

    <!-- Image and Table side by side -->
    <div class="container-fluid">
        <div class="row">
            <!-- Column for Image -->
            <div class="col-md-6 text-center">
                <img src="images/pets.jpeg" alt="Pets" class="img-fluid content-image">
            </div>

            <!-- Column for Table -->
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Pet</th>
                                <th>Type</th>
                                <th>Age</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
