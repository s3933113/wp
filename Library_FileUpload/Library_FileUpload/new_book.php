<?php
$title = "Add New Book";
include('includes/header.inc');
?>
<h1>Welcome to the Library</h1>
<?php
include('includes/nav.inc');
?>
<h2>Add New Book</h2>
<form action="process_new_book.php" method="post" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required><br>
    <label for="author">Author</label>
    <input type="text" name="author" id="author" required><br>
    <label for="genre">Genre</label>
    <input type="text" name="genre" id="genre" required><br>
    <label for="published">Year</label>
    <input type="number" name="published" id="published" required min="1900" max="<?= date('Y') ?>" size="4"><br>
    <label for="description">Synopsis</label>
    <br>
    <textarea rows="10" cols="50" name="description" id="description" required></textarea><br>
    <label for="file01">Supporting Files</label>
    <input type="file" name="file01" id="file01"><br>
    <input type=submit value="Add New Book">
</form>
<?php
include('includes/footer.inc');
?>