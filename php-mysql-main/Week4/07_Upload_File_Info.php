<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload - File Information</title>
</head>
<body>
    <!-- method="post" and enctype="multipart/form-data" are required for uploads -->
    <form action="" method="post" enctype="multipart/form-data">
        <label>Select Your image</label><hr>
        <input type="file" name="stdimage"><hr>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_FILES['stdimage']['name'])) {
            echo "File Name : " . $_FILES['stdimage']['name'] . "<br>";
            echo "File Size : " . $_FILES['stdimage']['size'] . " bytes<br>";
            echo "Temporary Name : " . $_FILES['stdimage']['tmp_name'] . "<br>";
            echo "File Type : " . $_FILES['stdimage']['type'] . "<br>";
        } else {
            echo "no file is selected";
        }
    }
    ?>
</body>
</html>
