<?php
declare(strict_types=1);

function getGreeting(): string {
    $hour = (int)date('H');
    if ($hour < 6) {
        return 'Доброй ночи';
    } elseif ($hour < 12) {
        return 'Доброе утро';
    } elseif ($hour < 18) {
        return 'Добрый день';
    } else {
        return 'Добрый вечер';
    }
}

$title = 'Сайт нашей школы';
$welcome = getGreeting(); 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <img src="sss/logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
</header>

<section>
    <h1><?= $welcome ?>, Гость!</h1>
    <p>Добро пожаловать на наш сайт! Здесь вы найдете информацию о нашей школе, контакты, расписание занятий и многое другое.</p>
</section>

<nav>
    <h2>Навигация по сайту</h2>
    <ul>
        <li><a href='index.php?id=about'>О нас</a></li>
        <li><a href='index.php?id=contact'>Контакты</a></li>
        <li><a href='index.php?id=table'>Таблица умножения</a></li>
        <li><a href='index.php?id=calc'>Калькулятор</a></li>
    </ul>
</nav>

<footer>
    &copy; <?= date('Y') ?> Супер Мега Веб-мастер
</footer>
</body>
</html>
