<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multidimensional Arrays</title>
</head>
<body>

<?php

$student = array(
    array("Mohamed", 1990, "Hodan", "0608124390"),
    array("Ahmed", 2001, "Yaaqshiid", "0608124391"),
    array("Jaamac", 1986, "Shangaani", "0608124392")
);

echo "Printing array values:<br>";

foreach ($student as $s) {
    echo "$s[0], $s[1], $s[2], $s[3]<br>";
}

?>

</body>
</html>
