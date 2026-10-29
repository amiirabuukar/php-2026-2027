<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listbox (multiple choice)</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <select name="residence[]" multiple>
            <option value="Muqdisho">Muqdisho</option>
            <option value="Hargeysa">Hargeysa</option>
            <option value="Kismayo">Kismayo</option>
            <option value="Marko">Marko</option>
        </select><br>
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (!empty($_POST['residence'])) {
        $list = $_POST['residence'];
        sort($list);
        $last = count($list) - 1;
        foreach ($list as $i => $r) {
            echo $r . (($i == $last) ? "." : ", ");
        }
    }
    ?>
</body>
</html>
