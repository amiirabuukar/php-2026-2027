<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - Limit File Extensions</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="stdimage"><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['stdimage']['name'])) {
        $extensions = array("png", "pdf");
        $name_ext = explode(".", $_FILES['stdimage']['name']);
        $ext = strtolower(end($name_ext));
        $destination = "Docs/" . $_FILES['stdimage']['name'];

        if ($_FILES['stdimage']['size'] > 50 * 1024) {
            echo "File size is Not allowed";
        } elseif (!in_array($ext, $extensions)) {
            echo "<br>File extension: $ext is not allowed";
        } else {
            if (move_uploaded_file($_FILES['stdimage']['tmp_name'], $destination)) {
                echo "File uploaded successfully";
            } else {
                echo "File upload failed";
            }
        }
    }
    ?>
</body>
</html>
