<?php
    $tmp = $_FILES['file01']['tmp_name'];
    $dest = "uploads/{$_FILES['file01']['name']}";
    move_uploaded_file($tmp, $dest);
?>