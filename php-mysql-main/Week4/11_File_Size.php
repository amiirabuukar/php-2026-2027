<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - Check File Size</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="stdimage"><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['stdimage']['name'])) {
        $destination = "Docs/" . $_FILES['stdimage']['name'];

        // KB: size * 1024  |  MB: size * 1024 * 1024
        if ($_FILES['stdimage']['size'] < 10 * 1024) {      // limit = 10 KB
            if (move_uploaded_file($_FILES['stdimage']['tmp_name'], $destination)) {
                echo "File uploaded successfully";
            } else {
                echo "File upload failed";
            }
        } else {
            echo "File size is Not allowed";
        }
    }
    ?>
</body>
</html>
