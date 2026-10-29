<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

$marks = 87;

if ($marks >= 90) {
    echo "Excellent";
}
elseif ($marks >= 80) {
    echo "Very good";
}
elseif ($marks >= 50) {
    echo "Minimal pass";
}
else {
    echo "Not pass";
}

?>

</body>
</html>

