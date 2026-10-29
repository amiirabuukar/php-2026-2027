<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Radio Button</title>
</head>
<body>
    <form method="post">
        <input type="radio" name="sex" value="male">Male
        <input type="radio" name="sex" value="female">Female<br>
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    // Radio buttons: use isset / !empty because nothing is sent if none is selected
    if (!empty($_POST['sex'])) {
        echo "<br>sex: " . ucfirst($_POST['sex']);
    }
    ?>
</body>
</html>
