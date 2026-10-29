<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parameters vs Arguments</title>
</head>
<body>

<?php

// $a is a parameter
function factorial($a) {
    $result = 1;

    for ($i = 1; $i <= $a; $i++) {
        $result *= $i;
    }

    echo "Factorial of $a is: $result";
}

// 5 is an argument
factorial(5);

?>

</body>
</html>
