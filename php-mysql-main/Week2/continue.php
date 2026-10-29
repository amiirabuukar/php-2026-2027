<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do While Continue</title>
</head>

<body>

<?php

$i = 0;

do {

    $i++;

    if ($i % 2 == 0) {
        continue;
    } else {
        echo "$i, ";
    }

} while ($i <= 15);

?>

</body>
</html>

