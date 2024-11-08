<?php
declare(strict_types=1);

ini_set("session.use_only_cookies", "0");
ini_set("session.use_trans_sid", "1");
session_start();

if (!isset($_SESSION['visitedPages'])) {
    $_SESSION['visitedPages'] = [];
}

$currentPage = basename($_SERVER['PHP_SELF']);
if (!in_array($currentPage, $_SESSION['visitedPages'])) {
    $_SESSION['visitedPages'][] = $currentPage;
}
?>
