<?php
$title = "Add new car";
include('includes/header.inc');
?>
<?php
//can print what is in $_FILES array
//var_dump($_FILES);
include('includes/db_connect.inc');

$make = $_POST['make'];
$model = $_POST['model'];
$manufactured = $_POST['manufactured'];
$image = str_replace(' ', '', $_FILES["image"]["name"]);

$stmt = $conn->prepare('insert into fleet (make, model, manufactured, image) values (?, ?, ?, ?)');
$stmt->bind_param("ssss", $make, $model, $manufactured, $image);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    echo "A new car has been added";
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
}
?>
<br><a href="cars.php">Back to list of cars</a>
<?php
include('includes/footer.inc');
?>