<?php
declare(strict_types=1);

$constants = get_defined_constants(true);
foreach ($constants as $category => $constArray) {
    echo "<h2>Категория: $category</h2><ul>";
    foreach ($constArray as $name => $value) {
        echo "<li><strong>$name:</strong> " . htmlspecialchars((string) $value) . "</li>";
    }
    echo "</ul>";
}
?>
