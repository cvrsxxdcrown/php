<?php
declare(strict_types=1);

function getMenu(array $menu, bool $vertical = true): void {
    $class = $vertical ? "menu vertical" : "menu horizontal";
    echo "<ul class='$class'>";
    
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }

    echo "</ul>";
}

$leftMenu = [
    ['link' => 'Домой', 'href' => '***'],
    ['link' => 'О нас', 'href' => '***'],
    ['link' => 'Контакты', 'href' => '***'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => '***']
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .vertical li {
            display: block;
            margin-bottom: 10px;
        }

        .horizontal li {
            display: inline;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Меню</h1>
    <?php
    getMenu($leftMenu);
    getMenu($leftMenu, false);
    ?>
</body>
</html>
