<?php
declare(strict_types=1);

/**
 *
 * @param int $rows 
 * @param int $cols 
 * @return string 
 */
function getTable(int $rows, int $cols): string {
    $html = '<table border="1">';
    for ($row = 1; $row <= $rows; $row++) {
        $html .= '<tr>';
        for ($col = 1; $col <= $cols; $col++) {
            $html .= '<td>' . ($row * $col) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

/**
 *
 * @param array $menu 
 * @return string 
 */
function getMenu(array $menu): string {
    $html = '<ul>';
    foreach ($menu as $item => $link) {
        $html .= "<li><a href=\"$link\">$item</a></li>";
    }
    $html .= '</ul>';
    return $html;
}
?>
