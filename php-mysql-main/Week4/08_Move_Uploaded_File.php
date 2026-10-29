<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - move_uploaded_file()</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>Select Your image</label><hr>
        <input type="file" name="stdimage"><hr>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['stdimage']['name'])) {
        // Move the uploaded file from tmp folder to Docs/
        $temp = $_FILES['stdimage']['tmp_name'];
        $destination = "Docs/" . $_FILES['stdimage']['name'];

        if (move_uploaded_file($temp, $destination)) {
            echo "File uploaded successfully";
        } else {
            echo "File upload failed";
        }
    }
    ?>
</body>
</html>
