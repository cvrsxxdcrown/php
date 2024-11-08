<?php
declare(strict_types=1);

/**
 * Сохраняет текущую страницу в сессии
 *
 * @param string $page URL страницы для сохранения
 */
function saveCurrentPage(string $page): void {
    if (!isset($_SESSION['visited_pages'])) {
        $_SESSION['visited_pages'] = [];
    }

    $_SESSION['visited_pages'][] = $page;

    // Ограничение на количество сохранённых страниц (например, 10)
    if (count($_SESSION['visited_pages']) > 10) {
        array_shift($_SESSION['visited_pages']);
    }
}

// Сохранение текущей страницы
saveCurrentPage($_SERVER['PHP_SELF']);
?>
