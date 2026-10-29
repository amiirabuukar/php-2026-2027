<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default Argument</title>
</head>
<body>

<?php

function factorial($a = 5) {

    $result = 1;

    for ($i = 1; $i <= $a; $i++) {
        $result *= $i;
    }

    echo "Factorial of $a is: $result";
}

// No argument is supplied, so default value 5 is used
factorial();

?>

</body>
</html>
