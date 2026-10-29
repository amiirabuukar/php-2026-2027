<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2/title>
</head>

<body>
    <?php
    $numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];
    $total = 0;
    $evenTotal = 0;
    $oddTotal = 0;

    foreach ($numbers as $number) {
        $total += $number;

        if ($number % 2 === 0) {
            $evenTotal += $number;
        } else {
            $oddTotal += $number;
        }
    }

    $minimum = min($numbers);
    $maximum = max($numbers);
    $minimumPositions = [];
    $maximumPositions = [];

    foreach ($numbers as $index => $number) {
        if ($number === $minimum) {
            $minimumPositions[] = $index + 1;
        }

        if ($number === $maximum) {
            $maximumPositions[] = $index + 1;
        }
    }
    ?>

    <h1>One-Dimensional Array</h1>
    <p>Elements: <?= implode(', ', $numbers) ?></p>
    <p>Total of all elements: <?= $total ?></p>
    <p>Total of even elements: <?= $evenTotal ?></p>
    <p>Total of odd elements: <?= $oddTotal ?></p>
    <p>Minimum element: <?= $minimum ?></p>
    <p>Minimum positions: <?= implode(', ', $minimumPositions) ?></p>
    <p>Maximum element: <?= $maximum ?></p>
    <p>Maximum positions: <?= implode(', ', $maximumPositions) ?></p>
</body>

</html>