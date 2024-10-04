<?php
$title = "Library";
include('includes/header.inc');
?>
<h1>Welcome to the Library</h1>
<?php
include('includes/nav.inc');
?>
<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
    </tr>
    <?php
    //connect
    include('includes/db_connect.inc');

    $sql = "select * from book";

    $result = $conn->query($sql);
    //loop through the table of results printing each row
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {
            print "<tr>\n";
            print "<td><a href='book.php?id=" . urlencode($row['bookid']) . "'>{$row['title']}</a></td>\n";
            print "<td><a href='author.php?author=" . urlencode($row['author']) . "'>{$row['author']}</a></td>\n";
            print "<td><a href='genre.php?genre=" . urlencode($row['genre']) . "'>{$row['genre']}</a></td>\n";
            print "<td>{$row['published']}</td>\n";
            print "</tr>\n";
        }
    } else {
        echo "<tr><td colspan=4>0 results</td></tr>";
    }
    ?>
</table>
<?php
$conn->close();
include('includes/footer.inc');
?>