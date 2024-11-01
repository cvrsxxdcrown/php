<?php
declare(strict_types=1);

/**
 * @param int $cols 
 * @param int $rows 
 * @param string $color 
 */
function drawTable(int $cols, int $rows, string $color): void {
    echo '<table style="border: 1px solid black; border-collapse: collapse;">';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            echo "<td style='border: 1px solid black; background-color: $color; padding: 5px; text-align: center;'>$i x $j = " . ($i * $j) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int)$_POST['cols']);
    $rows = abs((int)$_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}

$cols = $cols ?? 10;
$rows = $rows ?? 10;
$color = $color ?? '#ffff00';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
</head>
<body>
<section>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
        <label>Строки: <input type="number" name="rows" value="<?= $rows ?>" required></label>
        <label>Столбцы: <input type="number" name="cols" value="<?= $cols ?>" required></label>
        <label>Цвет: <input type="color" name="color" value="<?= $color ?>"></label>
        <button type="submit">Нарисовать таблицу</button>
    </form>
    
    <h2>Таблица умножения</h2>
    <?php drawTable($cols, $rows, $color); ?>
</section>
</body>
</html>
