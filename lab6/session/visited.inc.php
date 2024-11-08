<?php
declare(strict_types=1);

session_start();

if (isset($_SESSION['visitedPages']) && count($_SESSION['visitedPages']) > 0) {
    echo "<h2>Список посещённых страниц</h2><ul>";
    foreach ($_SESSION['visitedPages'] as $page) {
        echo "<li>$page</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Вы еще не посещали страницы.</p>";
}
?>
