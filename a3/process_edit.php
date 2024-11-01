<?php
// Start session if it's not already started
session_start();

// Connect to the database
include('includes/db_connect.inc');

// Check if the pet ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $petid = $_GET['id'];

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the updated form data
        $petName = $_POST['pet-name'];
        $petType = $_POST['pet-type'];
        $description = $_POST['description'];
        $age = $_POST['age'];
        $location = $_POST['location'];

        // Handle the image upload if a new file is provided
        $imageFileName = $_FILES['pet-image']['name'] ? basename($_FILES['pet-image']['name']) : null;
        $uploadDir = 'images/';

        if ($imageFileName) {
            $targetFilePath = $uploadDir . $imageFileName;
            move_uploaded_file($_FILES['pet-image']['tmp_name'], $targetFilePath);
        } else {
            // Use the existing image if no new file is provided
            $stmt = $conn->prepare("SELECT image FROM pets WHERE petid = ?");
            $stmt->bind_param("i", $petid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imageFileName = $row['image'];
            }
            $stmt->close();
        }

        // Update the pet data in the database
        $stmt = $conn->prepare("UPDATE pets SET petname = ?, type = ?, description = ?, age = ?, location = ?, image = ? WHERE petid = ?");
        $stmt->bind_param("sssissi", $petName, $petType, $description, $age, $location, $imageFileName, $petid);
        
        // Redirect on success or show an error
        if ($stmt->execute()) {
            header("Location: details.php?id=$petid&message=update_success");
            exit();
        } else {
            echo "<p class='text-danger text-center'>Error updating pet information.</p>";
        }

        $stmt->close();
    }
} else {
    echo "<p class='text-danger text-center'>Invalid or missing pet ID.</p>";
}

$conn->close();
?>
