<?php
$title = 'Car Form';
$h1 = 'New car';
include('includes/header.inc');
?>
<header>
    <h1><?= $h1 ?></h1>
</header>

<form action="process_form.php" method="post" enctype="multipart/form-data">
    <label for="make">make</label>
    <input type="text" name="make" id="make" required><br><br>
    <label for="model">model</label>
    <input type="text" name="model" id="model" required><br><br>
    <label for="manufactured">manufactured</label>
    <input type="number" name="manufactured" id="manufactured" size="4" maxlength="4" min="1900" max="2021" required><br><br>
    <label for="image">Select an image to upload</label>
    <input type="file" name="image" id="image" required><br><br>
    <input type="submit" value="submit"><br><br>
</form>
<?php
include('includes/footer.inc');
?>