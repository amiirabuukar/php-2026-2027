<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
</head>
<body>

<?php

$info = array(
    "Mohamed",
    "Ahmed",
    "Jaamac",
    21
);

// Check if a variable is an array
if (is_array($info)) {
    echo "Yes, it is an array";
} else {
    echo "No, it is not an array";
}

// Check if a value exists
if (in_array("Ahmed", $info)) {
    echo "<br>Ahmed exists in the array";
} else {
    echo "<br>Ahmed does not exist in the array";
}

// Count elements
echo "<br>Number of elements: " . count($info);

?>

</body>
</html>
