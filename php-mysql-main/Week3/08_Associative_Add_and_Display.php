<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array Display</title>
</head>
<body>

<?php

$info["id"] = "101";
$info["name"] = "Mohamed Abdi Ali";
$info["age"] = 20;
$info["address"] = "Hodan District";
$info["status"] = "single";
$info["weight"] = 160.5;

echo "Associative array elements are:<br>";

foreach ($info as $a) {
    echo "$a<br>";
}

echo "<br>Printing array key/value pairs:<br>";

foreach ($info as $k => $v) {
    echo "[$k]: $v<br>";
}

?>

</body>
</html>
