<?php
declare(strict_types=1);

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
