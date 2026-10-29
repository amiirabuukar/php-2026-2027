<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explode and Shuffle</title>
</head>
<body>

<?php

$a = "The quick brown fox jumps over the lazy dog";

$b = explode(" ", $a);

shuffle($b);

echo "<pre>";
print_r($b);
echo "</pre>";

?>

</body>
</html>
