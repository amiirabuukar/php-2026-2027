<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBALS Superglobal</title>
</head>
<body>

<?php

$a = 5;

function showValue() {

    echo "Value of a = " . $GLOBALS["a"];
}

showValue();

?>

</body>
</html>
