<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>О сайте</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
  </header>
  <section>
    <h1>О нашем сайте</h1>
    <!-- Область основного контента -->
    <p>Сайт создан на общественных началах и управляется на некоммерческой основе. Все фотографии и материалы предоставлены и используются с ведома и при участии администрации школы.</p>
    <h3>Цели создания проекта</h3>
    <ol>
      <li>Поднятие престижа нашей школы.</li>
      <li>Информирование родителей будущих учеников нашей школы.</li>
      <li>Возобновление связей между выпускниками и учителями, предоставление им информационного пространства для общения.</li>
      <li>Организация общения учеников во внеурочное время.</li>
    </ol>
    <h3>Советы и предупреждения</h3>
    <p>Сайт оптимизирован под все браузеры. Наилучшее качество просмотра достигается при разрешении экрана 1280x1024 точек.</p>
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
