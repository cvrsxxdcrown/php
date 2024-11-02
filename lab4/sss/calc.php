<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Он-лайн калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['operator'] ?? '+';

    if ($num1 === false || $num2 === false) {
        $result = "Введите корректные числа.";
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
                $result = ($num2 != 0) ? $num1 / $num2 : 'Ошибка: деление на ноль!';
                break;
            default:
                $result = "Неизвестный оператор.";
        }
    }
}
?>

<form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <p><label for="num1">Число 1:</label>
    <input type="text" name="num1" id="num1" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>" required></p>

    <p><label for="operator">Оператор:</label>
    <select name="operator" id="operator">
        <option value="+" <?= (isset($_POST['operator']) && $_POST['operator'] === '+') ? 'selected' : '' ?>>+</option>
        <option value="-" <?= (isset($_POST['operator']) && $_POST['operator'] === '-') ? 'selected' : '' ?>>-</option>
        <option value="*" <?= (isset($_POST['operator']) && $_POST['operator'] === '*') ? 'selected' : '' ?>>*</option>
        <option value="/" <?= (isset($_POST['operator']) && $_POST['operator'] === '/') ? 'selected' : '' ?>>/</option>
    </select></p>

    <p><label for="num2">Число 2:</label>
    <input type="text" name="num2" id="num2" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>" required></p>

    <button type="submit">Считать!</button>
</form>

<?php if ($result !== null): ?>
    <p><strong>Результат: <?= htmlspecialchars((string)$result) ?></strong></p>
<?php endif; ?>

</body>
</html>
