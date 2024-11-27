<?php
$visitCount = 0;
$lastVisit = date('d-m-Y H:i:s');

if(isset($_COOKIE['visitCount'])) {
    $visitCount = $_COOKIE['visitCount'] + 1;
}
setcookie('visitCount', $visitCount, time() + 86400);

if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = htmlspecialchars(trim($_COOKIE['lastVisit']));
}
setcookie('lastVisit', date('d-m-Y H:i:s'), time() + 86400);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php
echo "<p>Количество посещений: " . $visitCount . "</p>";
echo "<p>Последнее посещение: " . $lastVisit . "</p>";
?>

</body>
</html>