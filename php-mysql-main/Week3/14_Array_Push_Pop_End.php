<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Push Pop End</title>
</head>
<body>

<?php

$a = array(2, 4, 6, 8);

array_push($a, 10);

echo "After array_push:<br>";
echo "<pre>";
print_r($a);
echo "</pre>";

$b = array(1, 2, 3, 4);

$removed = array_pop($b);

echo "Removed element: $removed<br>";

$last = end($a);

echo "The last element of the array is: " . $last;

?>

</body>
</html>
