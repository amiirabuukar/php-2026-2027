<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Total</title>
</head>
<body>

<?php

$numbers = array(10, 10, 15);
$total = 0;

foreach ($numbers as $n) {
    $total += $n;
}

echo "Total of all elements is: $total";

?>

</body>
</html>
