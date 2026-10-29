<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$number = 12345;
$reverse = 0;
$temp = $number;

while ($temp > 0) {

    $digit = $temp % 10;
    $reverse = ($reverse * 10) + $digit;
    $temp = intdiv($temp, 10);
}

echo "Original number: $number<br>";
echo "Reverse number: $reverse";
?>
</body>
</html>