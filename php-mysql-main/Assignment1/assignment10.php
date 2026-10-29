<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

for ($number = 10; $number <= 50; $number++) {

    $isPrime = true;

    for ($i = 2; $i < $number; $i++) {

        if ($number % $i == 0) {

            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo $number . " ";
    }
}

?>
</body>
</html>