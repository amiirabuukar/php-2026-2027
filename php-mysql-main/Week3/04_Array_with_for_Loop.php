<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array with For Loop</title>
</head>
<body>

<?php

$info = array(
    "101",
    "Mohamed Abdi Ali",
    20,
    "Hodan District",
    "single"
);

echo "Array values using for loop:<br>";

for ($i = 0; $i < count($info); $i++) {
    echo $info[$i] . "<br>";
}

?>

</body>
</html>
