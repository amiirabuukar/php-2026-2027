<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2 </title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #d9d9d9;
        }
    </style>
</head>

<body>
    <?php
    $colors = [
        'Light' => [
            'Red' => 'Light Red',
            'Green' => 'Light Green',
            'Blue' => 'Light Blue'
        ],
        'Normal' => [
            'Red' => 'Normal Red',
            'Green' => 'Normal Green',
            'Blue' => 'Normal Blue'
        ],
        'Dark' => [
            'Red' => 'Dark Red',
            'Green' => 'Dark Green',
            'Blue' => 'Dark Blue'
        ]
    ];
    ?>

    <h1>Color Array</h1>
    <table>
        <tr>
            <th></th>
            <th>Red</th>
            <th>Green</th>
            <th>Blue</th>
        </tr>
        <?php
        foreach ($colors as $rowName => $row) {
            echo "<tr>";
            echo "<th>$rowName</th>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>