<?php
declare(strict_types=1);

/**
 * @return string
 */
function getGreeting(): string {
    $hour = (int)date('H');
    if ($hour < 12) {
        return 'Доброе утро';
    } elseif ($hour < 18) {
        return 'Добрый день';
    } else {
        return 'Добрый вечер';
    }
}
?>
