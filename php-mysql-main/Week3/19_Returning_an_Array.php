<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returning an Array</title>
</head>
<body>

<?php

$array1 = array(9, 2, 7, 5, 1, 6, 3, 8, 4);

function passingArray($arr) {

    echo "Passed array elements are: ";

    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i] . ", ";
        $arr[$i]++;
    }

    return $arr;
}

$b = passingArray($array1);

echo "<br>Returned array elements are: ";

foreach ($b as $v) {
    echo "$v, ";
}

?>

</body>
</html>
