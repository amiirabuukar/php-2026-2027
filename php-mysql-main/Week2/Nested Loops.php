<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

for ($row = 5; $row <= 10; $row++) {

    for ($column = 3; $column <= 8; $column++) { 

        echo ($row * $column) . " ";
    }

    echo "<br>";
}

?>
</body>
</html>