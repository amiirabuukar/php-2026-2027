<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Keyword</title>
</head>
<body>

<?php

$a = 5;

function showGlobal() {

    global $a;

    echo "Value of global a = $a";
}

showGlobal();

?>

</body>
</html>
