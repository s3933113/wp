<?php
$title = "Authors";
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

        while ($row = mysqli_fetch_array($result)) {
            print "<tr>\n";
            print "<td>{$row['title']}</td>\n";
            print "<td><a href='author.php?author=" . urlencode($row['author']) . "'>{$row['author']}</a></td>\n";
            print "<td>{$row['genre']}</td>\n";
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