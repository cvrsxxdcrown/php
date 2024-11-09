<?php
declare(strict_types=1);

include 'session/cookie.php';

ini_set("session.use_only_cookies", "0");
ini_set("session.use_trans_sid", "1");
session_start();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Навигация</title>
</head>
<body>
    <h1>Главная страница</h1>
    <nav>
        <ul>
            <li><a href="session/page1.php">Страница 1</a></li>
            <li><a href="session/page2.php">Страница 2</a></li>
            <li><a href="session/page3.php">Страница 3</a></li>
        </ul>
    </nav>
</body>
</html>
<? include 'session/visited.inc.php' ?>
