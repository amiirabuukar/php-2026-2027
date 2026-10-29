<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Textbox and Password</title>
    <style>
        form { width: 200px; padding: 25px; border: 1px solid #ccc; border-radius: 10px; }
        label { display: block; margin-top: 5px; margin-bottom: 5px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; box-sizing: border-box;
            border: 1px solid #aaa; border-radius: 5px;
        }
        input[type="submit"], input[type="reset"] {
            margin-top: 20px; padding: 10px 20px; border: none;
            border-radius: 5px; cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Form Data -->
    <form method="post">
        <label for="name">Enter Full Name</label>
        <input type="text" name="name" id="name">

        <label for="pass">Enter Password</label>
        <input type="password" name="pass" id="pass">

        <input type="reset" value="reset form">
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        echo "User name: " . htmlspecialchars($_POST['name']);
        echo "<br>Password: " . htmlspecialchars($_POST['pass']);
    }
    ?>
</body>
</html>
