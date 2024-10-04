<?php
$title = "Author details";
include('includes/header.inc');
?>
<h1>Welcome to the Library</h1>
<?php
include('includes/nav.inc');
?>

<?php
if (!empty($_GET['author'])) {
    include('includes/db_connect.inc');

    $author = $_GET['author'];

    $sql = "select * from book where author = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $author);

    $stmt->execute();

    $result = $stmt->get_result();

    //loop through the table of results printing each row
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print "<h2>{$row['title']}</h2>";
            print "<h3>by {$row['author']}</h3>";
            print "<h4>Genre: {$row['genre']} Year: {$row['published']}</h4>";
            print "<p>{$row['description']}</p>";
        }
    }
    $conn->close();
}
?>
<?php
include('includes/footer.inc');
?>