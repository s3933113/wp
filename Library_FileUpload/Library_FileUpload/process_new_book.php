<?php
function validateInput($str)
{
    $ret = trim($str);
    return $ret;
}
/*$title = validateInput($_POST['title']);
$author = validateInput($_POST['author']);
$genre = validateInput($_POST['genre']);
$published = validateInput($_POST['published']);
$description = validateInput($_POST['description']);
*/
foreach ($_POST as $key => $value) {
    # code...
    $$key = validateInput($value);
}

include('includes/db_connect.inc');

$sql = "INSERT INTO book (title, author, genre, published, description) VALUES (?,?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssis", $title, $author, $genre, $published, $description);

$stmt->execute();
$conn->close();
if ($stmt->affected_rows > 0) {
    if (!empty($_FILES['file01'])) {
        $tmp = $_FILES['file01']['tmp_name'];
        $dest = "uploadedFiles/{$_FILES['file01']['name']}"; // uploadedFiles is the folder name created in the current library folder
        move_uploaded_file($tmp, $dest);
    }
    //back to home
    header("Location:index.php");
    exit(0);
} else {
    echo "An error has occured!";
}

