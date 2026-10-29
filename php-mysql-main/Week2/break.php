<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While Loop Break</title>
</head>

<body>

<?php

$i = 1;

while ($i <= 15) {

    echo "$i, ";

    $i++;

    if ($i == 10) {
        break;
    }
}

?>

</body>
</html>

