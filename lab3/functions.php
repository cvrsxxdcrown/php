<?php
declare(strict_types=1);

$extensions = get_loaded_extensions();
foreach ($extensions as $extension) {
    echo "<h2>Модуль: $extension</h2><ul>";
    $functions = get_extension_funcs($extension);
    if ($functions) {
        foreach ($functions as $function) {
            echo "<li>$function</li>";
        }
    } else {
        echo "<li>Функции отсутствуют</li>";
    }
    echo "</ul>";
}
?>
