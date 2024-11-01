<?php
declare(strict_types=1);
require_once '<sss>inc/lib.inc.php';
require_once 'sss/inc/data.inc.php';
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));

switch($id){ 
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;
    case 'calc':
        $title = 'Он-лайн калькулятор';
        $header = 'Калькулятор';
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php include 'sss/inc/top.inc.php'; ?>
</header>
<section>
    <h1><?= $header ?></h1>
    <?php
    switch($id){
        case 'about': 
            include 'sss/about.php';
            break;
        case 'contact':
            include 'sss/contact.php';
            break;
        case 'table':
            include 'sss/table.php';
            break;
        case 'calc':
            include 'sss/calc.php';
            break;
        default:
            include 'sss/index.inc.php'; 
    }
    ?>
</section>
<nav>
    <h2>Навигация по сайту</h2>
    <?php include 'sss/inc/menu.inc.php'; ?>
</nav>
<footer>
    <p>&copy; <?= date('Y') ?> Сайт нашей школы</p>
    <?php include 'sss/inc/bottom.inc.php'; ?>
</footer>
</body>
</html>
