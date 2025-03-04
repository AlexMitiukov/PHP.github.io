<?php
session_start();
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: authorization.php"); // Если не авторизован, перенаправляем
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Админ Панель</title>
</head>
<body>
    <h1 style="text-align: center; font-size: 5em;">АДМИН ПАНЕЛЬ</h1>
    <p style="text-align: center;"><a href="logout.php">Выйти</a></p>
</body>
</html>