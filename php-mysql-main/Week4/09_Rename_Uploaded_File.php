<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - Rename File</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>Select Your image</label><hr>
        <input type="file" name="stdimage"><br>
        <label>Enter New File Name:</label><br>
        <input type="text" name="fullName"><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['stdimage']['name'])) {
        // Get the extension of the uploaded file
        $ext = explode(".", $_FILES['stdimage']['name']);
        $ext = end($ext);

        $temp = $_FILES['stdimage']['tmp_name'];
        $destination = "Docs/" . $_POST['fullName'] . "." . $ext;

        if (move_uploaded_file($temp, $destination)) {
            echo "File uploaded successfully";
        } else {
            echo "File upload failed";
        }
    } elseif (isset($_POST['submit'])) {
        echo "no file is selected";
    }
    ?>
</body>
</html>
