<?php
declare(strict_types=1);

$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_STRING);

    // Проверка, что оба числа введены корректно
    if ($num1 === false || $num2 === false) {
        $result = "Пожалуйста, введите числовые значения.";
    } else {
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $result = "Ошибка: деление на ноль!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $result = "Некорректный оператор.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
if ($result !== null) {
    echo "<p>Результат: " . htmlspecialchars($result) . "</p>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><label for="num1">Число 1</label><br>
    <input type="text" name="num1" id="num1" value="<?php echo isset($num1) ? htmlspecialchars((string)$num1) : ''; ?>" required></p>

    <p><label for="operator">Оператор</label><br>
    <select name="operator" id="operator">
        <option value="+" <?php echo isset($operator) && $operator === '+' ? 'selected' : ''; ?>>+</option>
        <option value="-" <?php echo isset($operator) && $operator === '-' ? 'selected' : ''; ?>>-</option>
        <option value="*" <?php echo isset($operator) && $operator === '*' ? 'selected' : ''; ?>>*</option>
        <option value="/" <?php echo isset($operator) && $operator === '/' ? 'selected' : ''; ?>>/</option>
    </select></p>

    <p><label for="num2">Число 2</label><br>
    <input type="text" name="num2" id="num2" value="<?php echo isset($num2) ? htmlspecialchars((string)$num2) : ''; ?>" required></p>

    <button type="submit">Считать!</button>
</form>

</body>
</html>
