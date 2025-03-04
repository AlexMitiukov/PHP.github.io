<?php
session_start(); // Начинаем сессию

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $file = "users.txt";

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $userData = explode(", ", $line);
            $storedLogin = trim(str_replace("Login: ", "", $userData[0]));
            $storedPassword = trim(str_replace("Password: ", "", $userData[1]));

            if ($login == $storedLogin && $password == $storedPassword) {
                $_SESSION["admin"] = true; // Устанавливаем сессионную переменную
                header("Location: admin_panel.php"); // Перенаправляем на админ-панель
                exit();
            }
        }

        $error = "Неверный логин или пароль";
    } else {
        $error = "Файл с пользователями не найден!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
</head>
<body>
    <h2>Авторизация</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Войти">
    </form>
</body>
</html>