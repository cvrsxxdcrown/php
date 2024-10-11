<?php
declare(strict_types=1);

/**
 * @param int 
 * @param int 
 * @param string 
 * @return int 
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
    static $count = 0;
    $count++;

    echo "<table>";
    for ($tr = 1; $tr <= $rows; $tr++) {
        echo "<tr>";
        for ($td = 1; $td <= $cols; $td++) {
            if ($tr === 1 || $td === 1) {
                echo "<th style='background-color:$color'>" . $tr * $td . "</th>";
            } else {
                echo "<td>" . $tr * $td . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table><br>";
    
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
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>

    <?php
    getTable();     
    getTable(5);        
    getTable(5, 5, 'lightblue'); 
    echo "Функция getTable() вызвана " . getTable() . " раз.";
    ?>
</body>
</html>
