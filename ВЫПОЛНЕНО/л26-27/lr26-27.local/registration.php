<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    $data = "Login: " . $login . ", Password: " . $password . "\n";

    $file = "users.txt";  // Имя файла для хранения данных

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Регистрация прошла успешно! Данные сохранены в файл.";
    } else {
        echo "Ошибка при записи в файл.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>