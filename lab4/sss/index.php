<?php
declare(strict_types=1);

require_once 'sss/inc/lib.inc.php';
require_once 'sss/inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="sss/style.css">
</head>
<body>
  <header>
    <?php include 'sss/inc/top.inc.php'; ?>
  </header>

  <section>
    <h1>Добро пожаловать на наш сайт!</h1>
    <?php include 'sss/inc/index.inc.php'; ?>
  </section>

  <nav>
    <?php include 'sss/inc/menu.inc.php'; ?>
  </nav>

  <footer>
    <?php include 'sss/inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>
