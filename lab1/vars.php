<?php

$name = 'Алекс';
$age = 20;

echo "Меня зовут: $name<br>";
echo "Мне $age лет<br>";

echo "Тип переменной \$name: " . gettype($name) . "<br>";
echo "Тип переменной \$age: " . gettype($age) . "<br>";

unset($name, $age);

echo "Переменная \$name после удаления: " . (isset($name) ? $name : 'переменная удалена') . "<br>";
echo "Переменная \$age после удаления: " . (isset($age) ? $age : 'переменная удалена') . "<br>";

?>
