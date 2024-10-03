<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Pet - Pets Victoria</title>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poetsen+One&family=Ysabeau+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/styles.css">
</head>
<body>

<header>
    <div class="header-container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <select class="dropdown" onchange="location = this.value;">
            <option>Select an Option...</option>
            <option value="index.html">Home</option>
            <option value="pets.html">Pets</option>
            <option value="add.html">Add a pet</option>
            <option value="gallery.html">Gallery</option>
        </select>
        <input type="text" placeholder="Search" class="search-bar">
        <img src="images/searchicon.png" alt="icon" class="icon">
    </div>
</header>

<main class="page3">
    <h1>Add a pet</h1>
    <p>You can add a new pet here</p>

    <form action="submit-pet.html" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pet-name">Pet Name: <span class="required">*</span></label>
            <input type="text" id="pet-name" name="pet-name" placeholder="Provide a name for the pet" required>
        </div>

        <div class="form-group">
            <label for="pet-type">Type: <span class="required">*</span></label>
            <select id="pet-type" name="pet-type" required>
                <option value="">--Choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bird">Bird</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description: <span class="required">*</span></label>
            <textarea id="description" name="description" rows="4" placeholder="Describe the pet briefly" required></textarea>
        </div>

      <div class="form-group">
    <label for="pet-image" class="label-with-note">
        Select an Image: <span class="required">*</span>
        <small><span class="small">Max image size: 500px</span></small>
    </label> 
    <input type="file" id="pet-image" name="pet-image" accept="image/*" required>
</div>


        <div class="form-group">
            <label for="image-caption">Image Caption: <span class="required">*</span></label>
            <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word" required>
        </div>

        <div class="form-group">
            <label for="age">Age (months): <span class="required">*</span></label>
            <input type="number" id="age" name="age" placeholder="Age of a pet in months" required>
        </div>

        <div class="form-group">
            <label for="location">Location: <span class="required">*</span></label>
            <input type="text" id="location" name="location" placeholder="Location of the pet" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-clear">Clear</button>
        </div>
    </form>
</main>

<footer>
    <p>&copy; Copyright Alongkorn Sirimuntanakul s3933113. All Rights Reserved | Designed for Pets Victoria</p>
</footer>


<script src="JavaScript/main.js"></script>
</body>
</html>