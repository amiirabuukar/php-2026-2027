<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Multiple Files</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myFiles[]" multiple>
        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_FILES['myFiles']['name'][0])) {
        for ($i = 0; $i < count($_FILES['myFiles']['name']); $i++) {
            if (move_uploaded_file($_FILES['myFiles']['tmp_name'][$i], "Docs/" . $_FILES['myFiles']['name'][$i])) {
                echo "<br>" . $_FILES['myFiles']['name'][$i] . " uploaded successfully";
            }
        }
    }
    ?>
</body>
</html>
