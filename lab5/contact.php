<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim(htmlspecialchars($_POST['subject'] ?? ''));
    $body = trim(htmlspecialchars($_POST['body'] ?? ''));

    $to = 'aigrevtcev@gmail.com'; 
    $from = 'admin@center.ogu\r\n';
    $headers = "From: $from";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Письмо успешно отправлено!</p>";
    } else {
        echo "<p>Ошибка при отправке письма.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контакты</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <h1>Обратная связь</h1>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label>Тема письма:</label><br>
        <input type="text" name="subject" size="50"><br>
        <label>Содержание:</label><br>
        <textarea name="body" cols="50" rows="10"></textarea><br><br>
        <button type="submit">Отправить</button>
    </form>
</section>
</body>
</html>
