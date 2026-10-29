<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="">Upload Files</label>

        <input type="file" name="stdimages" id="stdimages">
        <hr />
        <label for="">Rename File</label>
        <input type="text" name="filename" id="filename" placeholder="Enter File Name">
        <hr />
        <input type="submit" value="Upload">
        <hr />
    </form>

    <?php
    //Read all information from the file

    if (!empty($_FILES["stdimages"])) {
        echo "File Name: " . $_FILES["stdimages"]["name"] . "<hr />";
        echo "File Type: " . $_FILES["stdimages"]["type"] . "<hr />";
        echo "File Size: " . $_FILES["stdimages"]["size"] . "<hr />";
        echo "File Temp Path: " . $_FILES["stdimages"]["tmp_name"] . "<hr />";
        // move file from temp path to the final destination folder
        $temp = $_FILES["stdimages"]["tmp_name"];
        // Renaming the file
        $ext = explode(".", $_FILES["stdimages"]["name"]);
        $ext = end($ext);

        $Destination = "C:/Users/Fuaad Abuukar/Documents/php-files/" . $_POST["filename"] . "." . "$ext";

        //check if the file already exists
        if (file_exists($Destination)) {
            echo "File Already Exists";
            } else {
            // Check file size
            if($_FILES["stdimages"]["size"] < 100 * 1024) {
                // Limit file extension
                $extensions = array("jpg", "pdf");
                $file_name = explode(".", $_FILES["stdimages"]["name"]);
                $ext = strtolower(end($file_name));
                if(in_array($ext, $extensions)){
                    if (move_uploaded_file($temp, $Destination)) {
                        echo "File Uploaded Successfully";
                    } else {
                        echo "File Upload Failed";
                    }
                }else {
                    echo "Not allowed extinsion";
                }
            } else {
                echo "file is too big, maximun file sized allowed is 100KB";
            }

        }

    } else {
        echo "Please select file";
    }

    ?>
</body>

</html>