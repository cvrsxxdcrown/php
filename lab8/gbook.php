<?php
declare(strict_types=1);

include 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
$mysqli->set_charset(DB_CHARSET);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['first_name'], $_POST['email'], $_POST['msg'])) {
    $first_name = trim(htmlspecialchars($mysqli->real_escape_string($_POST['first_name'])));
    $last_name = isset($_POST['last_name']) ? trim(htmlspecialchars($mysqli->real_escape_string($_POST['last_name']))) : '';
    $email = trim(htmlspecialchars($mysqli->real_escape_string($_POST['email'])));
    $msg = trim(htmlspecialchars($mysqli->real_escape_string($_POST['msg'])));

    if (!empty($first_name) && !empty($email) && !empty($msg)) {
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@(yandex\.ru|mail\.ru|gmail\.com)$/', $email)) {
            echo "Почтовый адрес должен быть с доменом yandex.ru, mail.ru или gmail.com.";
        } else {
            $stmt = $mysqli->prepare("INSERT INTO msgs (first_name, last_name, email, msg) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $msg);

            if ($stmt->execute()) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
            $stmt->close();
        }
    } else {
        echo "Все поля, кроме фамилии, обязательны для заполнения.";
    }
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $mysqli->prepare("DELETE FROM msgs WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    $stmt->close();
}

$sql = "SELECT * FROM msgs ORDER BY id DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 100px; 
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .messages-container {
            width: 90%;
            max-width: 500px;
        }

        .message {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .message h3 {
            color: #333;
            margin: 0 0 10px;
            font-size: 18px;
        }

        .message p {
            color: #555;
            font-size: 15px;
            line-height: 1.5;
            margin: 0;
        }

        .message a {
            color: #dc3545;
            text-decoration: none;
            font-size: 14px;
            display: block;
            margin-top: 10px;
        }

        .message a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="first_name" required><br>
    Ваша фамилия (необязательно):<br>
    <input type="text" name="last_name"><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" required></textarea><br>
    <input type="submit" value="Добавить!">
</form>

<div class="messages-container">
<?php
if ($result->num_rows > 0): 
    while ($row = $result->fetch_assoc()): ?>
        <div class="message">
            <h3><?php echo htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($row['msg'])); ?></p>
            <a href="?delete=<?php echo $row['id']; ?>">Удалить</a>
        </div>
    <?php endwhile; 
else: ?>
    <p>Записей пока нет.</p>
<?php endif; ?>
</div>

</body>
</html>

<?php
$mysqli->close();
?>
