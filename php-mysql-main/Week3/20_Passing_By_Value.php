<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing By Value</title>
</head>
<body>

<?php

$a = 5;

function changeValue($x) {
    $x++;
    echo "Value inside function: $x<br>";
}

changeValue($a);

echo "Original value: $a";

?>

</body>
</html>
