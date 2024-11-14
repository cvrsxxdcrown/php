<?php
declare(strict_types=1);


$visits = isset($_COOKIE['visits']) ? (int)$_COOKIE['visits'] : 0;
$visits++; 

$lastVisit = isset($_COOKIE['lastVisit']) ? trim(htmlspecialchars($_COOKIE['lastVisit'])) : '';

setcookie('visits', (string)$visits, time() + 86400, "/"); 
setcookie('lastVisit', date('d-m-Y H:i:s'), time() + 86400, "/");
