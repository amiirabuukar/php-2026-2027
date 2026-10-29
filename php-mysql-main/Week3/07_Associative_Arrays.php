<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays</title>
</head>
<body>

<?php

// Associative array uses string keys
$info = array(
    "id" => "101",
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 160.5
);

echo "<pre>";
echo "Information about the person:<br>";
print_r($info);
var_dump($info);
echo "</pre>";

?>

</body>
</html>
