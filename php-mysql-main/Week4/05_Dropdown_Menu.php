<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drop-down Menu</title>
</head>
<body>
    <form method="post">
        <select name="pob">
            <option value="">-- Select city --</option>
            <option value="Muqdisho">Muqdisho</option>
            <option value="Hargeysa">Hargeysa</option>
            <option value="Kismayo">Kismayo</option>
            <option value="Marko">Marko</option>
        </select><br>
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (!empty($_POST['pob'])) {
        echo "<br>Place of birth: " . ucfirst($_POST['pob']);
    }
    ?>
</body>
</html>
