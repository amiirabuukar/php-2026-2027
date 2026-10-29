<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

$answer = 'N';

switch ($answer) {

    case 'y':
    case 'Y':
        echo "The answer was yes";
        break;

    case 'n':
    case 'N':
        echo "The answer was no";
        break;

    default:
        echo "Error: $answer is not valid";
}

?>

</body>
</html>

