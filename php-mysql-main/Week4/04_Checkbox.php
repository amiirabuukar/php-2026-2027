<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkbox</title>
</head>
<body>
    <form method="post">
        <input type="checkbox" name="faculties[]" value="engineering">Engineering
        <input type="checkbox" name="faculties[]" value="medicine">Medicine
        <input type="checkbox" name="faculties[]" value="computer sciences">Computer Sciences
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (!empty($_POST['faculties'])) {
        $list = $_POST['faculties'];
        sort($list);                         // sort checkbox values
        $last = count($list) - 1;
        foreach ($list as $i => $faculty) {
            echo ucfirst($faculty);
            echo ($i == $last) ? "." : ", "; // full stop after the last one
        }
    }
    ?>
</body>
</html>
