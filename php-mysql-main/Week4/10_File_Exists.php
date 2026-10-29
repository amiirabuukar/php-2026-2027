<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - file_exists()</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="stdimage"><br>
        <input type="text" name="fullName" placeholder="New file name"><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['stdimage']['name'])) {
        $ext = strtolower(pathinfo($_FILES['stdimage']['name'], PATHINFO_EXTENSION));
        $destination = "Docs/" . $_POST['fullName'] . "." . $ext;

        // Check whether file already exists
        if (file_exists($destination)) {
            echo "Sorry, file already exists";
        } else {
            if (move_uploaded_file($_FILES['stdimage']['tmp_name'], $destination)) {
                echo "File uploaded successfully";
            } else {
                echo "File upload failed";
            }
        }
    } elseif (isset($_POST['submit'])) {
        echo "no file is selected";
    }
    ?>
</body>
</html>
