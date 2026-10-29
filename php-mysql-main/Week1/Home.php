<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHp/title>
</head>

<body>

<?php

// 1. Echo
echo "Welcome to PHP";
echo "<br>";

// 2. Print
print "Hello World";
echo "<br>";

// 3. Variables
$name = "Fuaad";
$age = 20;

echo "My name is $name";
echo "<br>";

echo "My age is $age";
echo "<br>";

// 4. Constant
define("COUNTRY", "Somalia");

echo "Country: " . COUNTRY;
echo "<br>";

// 5. If / Elseif / Else
$age = 20;

if ($age >= 18) {
    echo "You are an Adult";
}
elseif ($age >= 13) {
    echo "You are a Teenager";
}
else {
    echo "You are a Child";
}

echo "<br>";

// 6. Switch
$answer = "N";

switch ($answer) {

    case "Y":
    case "y":
        echo "The answer was yes";
        break;

    case "N":
    case "n":
        echo "The answer was no";
        break;

    default:
        echo "Invalid answer";
        break;
}

echo "<br>";

// 7. Grade Checker
$marks = 87;

if ($marks >= 90) {
    echo "Excellent";
}
elseif ($marks >= 80) {
    echo "Very Good";
}
elseif ($marks >= 70) {
    echo "Good";
}
else {
    echo "Fail";
}

echo "<br>";

// 8. Switch Grade
$score = 80;

switch ($score) {

    case 100:
    case 90:
        echo "Grade A";
        break;

    case 80:
        echo "Grade B";
        break;

    case 70:
        echo "Grade C";
        break;

    case 60:
        echo "Grade D";
        break;

    default:
        echo "Fail";
        break;
}

?>

</body>
</html>

