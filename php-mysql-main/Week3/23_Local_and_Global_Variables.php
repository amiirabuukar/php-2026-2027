<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local and Global Variables</title>
</head>
<body>

<?php

$a = 5; // Global variable

function testScope() {

    $a = 10; // Local variable

    echo "Value of local a = $a<br>";
    echo "Value of global a = " . $GLOBALS["a"];
}

testScope();

?>

</body>
</html>
