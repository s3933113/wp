<?php
$title = 'Cars';
$h1 = 'Cars in fleet';
include('includes/header.inc');
?>
<header>
    <h1><?= $h1 ?></h1>
</header>
</a>
<?php
include('includes/db_connect.inc');

$sql = "SELECT * FROM fleet";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        print "<div>";
        print "<span class='carID'><a href='details.php?carID={$row["id"]}'>" . $row['id'] . "</a></span>";
        print " <span class='bold'>" . $row['make'] . " </span>";
        print "</div>";
    }
} else {
    echo "0 results";
}
?>
<?php
include('includes/footer.inc');
?>