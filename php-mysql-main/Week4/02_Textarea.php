<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Textbox, Password and Textarea</title>
</head>
<body>
    <form method="post">
        <input type="text" name="fullName" placeholder="Full name"><br>
        <input type="password" name="pinCode" placeholder="PIN code"><br>
        <!-- cols = width in characters, rows = height in lines -->
        <textarea name="comment" cols="30" rows="6"></textarea><br>
        <input type="reset" value="Reset form">
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        echo "User name: " . htmlspecialchars($_POST['fullName']);
        echo "<br>Password: " . htmlspecialchars($_POST['pinCode']);
        echo "<br>Comment: " . htmlspecialchars($_POST['comment']);
    }
    ?>
</body>
</html>
