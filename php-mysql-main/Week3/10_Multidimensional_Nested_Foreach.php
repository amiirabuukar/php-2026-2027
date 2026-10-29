<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Foreach</title>
</head>
<body>

<?php

$student = array(
    array("Mohamed", 1990, "Hodan", "0608124390"),
    array("Ahmed", 2001, "Yaaqshiid", "0608124391"),
    array("Jaamac", 1986, "Shangaani", "0608124392")
);

echo "Array elements are:<br>";

foreach ($student as $s) {
    foreach ($s as $v) {
        echo "$v<br>";
    }
}

?>

</body>
</html>
