<?php
$title = 'Cars';
$h1 = 'Car details';
include('includes/header.inc');
?>
<header>
    <h1><?= $h1 ?></h1>
</header>

<?php
if (!empty($_GET['carID'])) {

    include('includes/db_connect.inc');

    $id = $_GET['carID'];
    $sql = "SELECT * FROM fleet where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print "<div>";
            print "<span class='carID'>" . $row['id'] . " </span>";
            print "<span class='bold'>" . $row['make'] . " </span>";
            print $row['model'] . " ";
            print $row['manufactured'];
            print "</div>";
            if (!empty($row['image'])) {
                print "<div>";
                print "<img src='uploads/{$row['image']}' alt='{$row['make']}'>";
                print "</div>";
            }
        }
    } else {
        echo "0 results";
    }
} else {
    echo "There are no cars to display";
}
?>
<a href="cars.php">Back to list of cars</a>
<?php
include('includes/footer.inc');
?>