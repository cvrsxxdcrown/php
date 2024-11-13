<?php
use Classes\User;
use Classes\SuperUser;

function my_autoloader($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    include $path;
}

spl_autoload_register('my_autoloader');

$user1 = new User("Иван", "ivanov_123", "пароль123");
$user2 = new User("Мария", "maria_rose", "мояпароль456");
echo "<br>";

$user1->showInfo();
$user2->showInfo();
echo "<br>";

$user = new SuperUser("Дмитрий", "dmitry_superadmin", "суперпасс789", "суперадмин");
$user->showInfo();
echo "<br>";

?>
