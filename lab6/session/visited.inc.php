<?php
declare(strict_types=1);

// Устанавливаем параметры для сессий
ini_set("session.use_only_cookies", "0");
ini_set("session.use_trans_sid", "1");
session_start();

function displayVisitedPages(): void {
    if (isset($_SESSION['visited_pages']) && count($_SESSION['visited_pages']) > 0) {
        echo '<h2>Список посещённых страниц</h2>';
        echo '<ol>';
        foreach ($_SESSION['visited_pages'] as $page) {
            echo "<li>$page</li>";
        }
        echo '</ol>';
    } else {
        echo '<p>Нет посещённых страниц.</p>';
    }
}

// Вызов функции для отображения посещённых страниц
displayVisitedPages();
?>
