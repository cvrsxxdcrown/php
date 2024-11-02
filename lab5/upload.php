<?php
declare(strict_types=1);

$uploadDir = __DIR__ . '/upload';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
    $file = $_FILES['fupload'];

    echo "Имя файла: " . htmlspecialchars($file['name']) . "<br>";
    echo "Размер файла: " . $file['size'] . " байт<br>";
    echo "Временное имя файла: " . htmlspecialchars($file['tmp_name']) . "<br>";
    echo "Тип файла: " . mime_content_type($file['tmp_name']) . "<br>";
    echo "Код ошибки: " . $file['error'] . "<br>";

    if (mime_content_type($file['tmp_name']) === 'image/jpeg') {
        $newFileName = md5_file($file['tmp_name']) . '.jpg';

        if (move_uploaded_file($file['tmp_name'], "$uploadDir/$newFileName")) {
            echo "<p>Файл успешно загружен как $newFileName</p>";
        } else {
            echo "<p>Ошибка при перемещении файла!</p>";
        }
    } else {
        echo "<p>Только файлы JPEG разрешены для загрузки.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файла на сервер</title>
</head>
<body>
<div>
</div>
<form enctype="multipart/form-data" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
        <input type="file" name="fupload"><br>
        <button type="submit">Загрузить</button>
    </p>
</form>
</body>
</html>
