<?php
declare(strict_types=1);

define('FILE_NAME', __DIR__ . '/guestbook.txt'); // Константа для хранения имени файла

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['fname']) && !empty($_POST['lname'])) {
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));

    $entry = "$fname $lname\n"; // Формируем строку для записи

    // Открываем файл на добавление и записываем строку
    file_put_contents(FILE_NAME, $entry, FILE_APPEND);

    // Перезапрашиваем страницу для очистки POST данных
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Работа с файлами</title>
</head>
<body>
<h1>Заполните форму</h1>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Имя: <input type="text" name="fname"><br>
    Фамилия: <input type="text" name="lname"><br><br>
    <input type="submit" value="Отправить!">
</form>

<?php
// Выводим содержимое файла, если он существует
if (file_exists(FILE_NAME)) {
    $lines = file(FILE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $index => $line) {
        echo ($index + 1) . ". " . htmlspecialchars($line) . "<br>";
    }
    echo "<p>Размер файла: " . filesize(FILE_NAME) . " байт</p>";
}
?>
</body>
</html>
