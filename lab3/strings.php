<?php
declare(strict_types=1);

$login = ' User ';
$password = 'alexP@ssw0rd'; 
$name = 'alex'; 
$email = 'alex@ggg.ru'; 
$code = '<?=$login?>';

/**
 * @return string 
 */
$login = strtolower(trim($login));

/**
 * @return bool 
 */
function checkPasswordComplexity(string $password): bool {
    return preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/\d/', $password) &&
           strlen($password) >= 8;
}

$isPasswordComplex = checkPasswordComplexity($password);

$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");

$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL) !== false;

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
</head>
<body>
    <p>Логин: <?php echo htmlspecialchars($login); ?></p>
    <p>Сложность пароля: <?php echo $isPasswordComplex ? 'Пароль сложный' : 'Пароль не соответствует требованиям'; ?></p>
    <p>Имя: <?php echo htmlspecialchars($name); ?></p>
    <p>Email: <?php echo $isEmailValid ? 'Корректный' : 'Некорректный'; ?></p>
    <p>Код: <?php echo htmlspecialchars($code); ?></p>
</body>
</html>
