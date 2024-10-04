<?php
$title = "Book details";
include('includes/header.inc');
?>
<h1>Welcome to the Library</h1>
<?php
include('includes/nav.inc');
?>

<?php
if (!empty($_GET['id'])) {
    include('includes/db_connect.inc');

    $id = $_GET['id'];

    $sql = "select * from book where bookid = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {
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