<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Merge and Reverse</title>
</head>
<body>

<?php

$a1 = array(1, 2, 3);
$a2 = array(1, 5, 6);

$a3 = array_merge($a1, $a2);

echo "Merged array:<br>";
echo "<pre>";
print_r($a3);
echo "</pre>";

$p = array_reverse($a3);

echo "Reversed array:<br>";
echo "<pre>";
print_r($p);
echo "</pre>";

?>

</body>
</html>
