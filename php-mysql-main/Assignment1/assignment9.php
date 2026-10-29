<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$number = 29;
$isPrime = true;
if ($number < 2) {

    $isPrime = false;

} else {

    for ($i = 2; $i < $number; $i++) {

        if ($number % $i == 0) {

            $isPrime = false;
            break;
        }
    }
}

if ($isPrime) {

    echo "$number is a prime number.";

} else {

    echo "$number is a non-prime number.";

}

?>
</body>
</html>