<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2/title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #fd1616;
            padding: 0.5rem;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #d9d9d9;
        }
    </style>
</head>

<body>
    <?php
    $students = [
        'row1' => [
            'ID' => 'CA221',
            'Name' => 'Mohamed Ahmed Ali',
            'Phone' => '0648440403',
            'Address' => 'Laba Dhagax, Wardhiigley'
        ],
        'row2' => [
            'ID' => 'CA223',
            'Name' => 'Ahmed Abdi Jama',
            'Phone' => '0647223201',
            'Address' => 'Taleex, Hodan'
        ],
        'row3' => [
            'ID' => 'CA221',
            'Name' => 'Amina Nur Adan',
            'Phone' => '0646990276',
            'Address' => 'Macmacaanka, Dharkeynley'
        ]
    ];
    ?>

    <h1>Student Information</h1>
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            echo "<th>" . $student['ID'] . "</th>";
            echo "<td>" . $student['Name'] . "</td>";
            echo "<td>" . $student['Phone'] . "</td>";
            echo "<td>" . $student['Address'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>