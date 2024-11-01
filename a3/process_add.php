<?php

include('includes/db_connect.inc');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petName = $_POST['pet-name'];
    $petType = $_POST['pet-type'];
    $description = $_POST['description'];
    $imageCaption = $_POST['image-caption'];
    $age = $_POST['age'];
    $location = $_POST['location'];

    
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["pet-image"]["name"]);
    move_uploaded_file($_FILES["pet-image"]["tmp_name"], $target_file);

    
    $stmt = $conn->prepare("INSERT INTO pets (petname, type, description, caption, age, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $petName, $petType, $description, $imageCaption, $age, $location, basename($_FILES["pet-image"]["name"]));

    if ($stmt->execute()) {
        echo "New pet added successfully";
        header("Location: pets.php?message=add_success");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
