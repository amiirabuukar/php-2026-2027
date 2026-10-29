<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


$num1 = 25;
$num2 = 10;
$num3 = 40;

$greatest = $num1;
$smallest = $num1;


if ($num2 > $greatest) {
    $greatest = $num2;
}

if ($num3 > $greatest) {
    $greatest = $num3;
}


if ($num2 < $smallest) {
    $smallest = $num2;
}

if ($num3 < $smallest) {
    $smallest = $num3;
}

echo "Greatest number: $greatest<br>";
echo "Smallest number: $smallest";

?>
</body>
</html>