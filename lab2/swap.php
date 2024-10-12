<?php
function swap(int &$a, int &$b): void {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$a = 5;
$b = 8;

swap($a, $b);

echo "a: $a<br>"; 
echo "b: $b<br>"; 

echo ($a === 8) ? 'a равен 8' : 'a не равен 8'; 
echo "<br>";
echo ($b === 5) ? 'b равен 5' : 'b не равен 5'; 
?>
