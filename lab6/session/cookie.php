<?php
declare(strict_types=1);

$visits = isset($_COOKIE['visits']) ? (int)$_COOKIE['visits'] : 0;
$visits++;

$lastVisit = isset($_COOKIE['lastVisit']) ? trim(htmlspecialchars($_COOKIE['lastVisit'])) : '';

setcookie('visits', (string)$visits, time() + 86400); 
setcookie('lastVisit', date('d-m-Y H:i:s'), time() + 86400); 

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php
if ($visits === 1) {
    echo "<p>Добро пожаловать!</p>";
} else {
    echo "<p>Вы зашли на страницу $visits раз(а).</p>";
    if ($lastVisit) {
        echo "<p>Последнее посещение: $lastVisit</p>";
    }
}
?>

</body>
</html>
