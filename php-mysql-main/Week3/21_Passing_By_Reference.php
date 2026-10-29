<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing By Reference</title>
</head>
<body>

<?php

$a = 5;

function changeValue(&$x) {
    $x++;
}

changeValue($a);

echo "Value of a = $a";

?>

</body>
</html>
