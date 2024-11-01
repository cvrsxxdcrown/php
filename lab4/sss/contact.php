<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакты</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
  </header>
  <section>
    <h1>Обратная связь</h1>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>
    <form action="" method="post">
      <label>Тема письма: </label><br>
      <input name="subject" type="text" size="50"><br>
      <label>Содержание: </label><br>
      <textarea name="body" cols="50" rows="10"></textarea><br><br>
      <input type="submit" value="Отправить">
    </form>
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href="index.php">Домой</a></li>
      <li><a href="index.php?id=about">О нас</a></li>
      <li><a href="index.php?id=contact">Контакты</a></li>
      <li><a href="index.php?id=table">Таблица умножения</a></li>
      <li><a href="index.php?id=calc">Калькулятор</a></li>
    </ul>
  </nav>
  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>
