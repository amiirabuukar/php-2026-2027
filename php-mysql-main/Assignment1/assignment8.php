<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

echo "<table border='1' cellpadding='8' cellspacing='0'>";

for ($row = 1; $row <= 12; $row++) {

    echo "<tr>";

    for ($col = 1; $col <= 12; $col++) {

        echo "<td>";
        echo $row * $col;
        echo "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>
</body>
</html>