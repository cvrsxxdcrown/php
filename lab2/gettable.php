<?php
declare(strict_types=1);

function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
    static $count = 0; 
    $count++; 

    echo "<table style='border: 2px solid black; border-collapse: collapse;'>";

    echo "<tr>";
    echo "<th style='background-color: $color;'></th>"; 
    for ($col = 1; $col <= $cols; $col++) {
        echo "<th style='background-color: $color;'>$col</th>";
    }
    echo "</tr>";

    for ($row = 1; $row <= $rows; $row++) {
        echo "<tr>";
        echo "<th style='background-color: $color;'>$row</th>"; 
        for ($col = 1; $col <= $cols; $col++) {
            echo "<td>" . ($row * $col) . "</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    return $count; 
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            margin-bottom: 20px; /* Отступ между таблицами */
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>

    <?php
    getTable(5, 5, 'red');
    getTable(10, 10, 'yellow');
    getTable(8, 10, 'yellow');
    getTable(5, 5, 'yellow');
    ?>
</body>
</html>
