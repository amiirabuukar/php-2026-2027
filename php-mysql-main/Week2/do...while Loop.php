<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php

$result = 1;

$n = 5;

do {

    $result *= $n;
    // $result = $result * $n;

    $n--;

} while ($n > 0);

echo $result;

?>


</body>
</html>