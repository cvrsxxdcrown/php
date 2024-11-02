<?php
declare(strict_types=1);

define('FILE_NAME', __DIR__ . '/guestbook.txt'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim(htmlspecialchars($_POST['fname'] ?? ''));
    $lname = trim(htmlspecialchars($_POST['lname'] ?? ''));

    if ($fname !== '' && $lname !== '') {
        $entry = "$fname $lname\n";

        file_put_contents(FILE_NAME, $entry, FILE_APPEND);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
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
