<?php
declare(strict_types=1);

$now = time();
$hour = (int) getdate()['hours'];

if ($hour >= 0 && $hour < 6) {
    $welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
} else {
    $welcome = 'Добрый вечер';
}

$currentYear = (int) date('Y');
$birthday = mktime(0, 0, 0, 10, 19, $currentYear); 

if ($now > $birthday) {
    $birthday = mktime(0, 0, 0, 10, 19, $currentYear + 1);
}

setlocale(LC_TIME, 'ru_RU.UTF-8');
$formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG, IntlDateFormatter::LONG);
$currentDate = $formatter->format($now);

$diffSeconds = $birthday - $now;
$daysLeft = (int)($diffSeconds / (60 * 60 * 24));
$hoursLeft = (int)(($diffSeconds % (60 * 60 * 24)) / (60 * 60));
$minutesLeft = (int)(($diffSeconds % (60 * 60)) / 60);
$secondsLeft = (int)($diffSeconds % 60);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Использование функций даты и времени</title>
</head>
<body>
    <h1>Использование функций даты и времени</h1>
    <p><?php echo $welcome; ?></p>
    <p><?php echo "Сегодня $currentDate"; ?></p>
    <p>До моего дня рождения осталось <?php echo "$daysLeft дней, $hoursLeft часов, $minutesLeft минут, $secondsLeft секунд"; ?></p>
</body>
</html>
