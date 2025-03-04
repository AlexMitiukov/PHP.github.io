<?php
session_start();
session_destroy(); // Уничтожаем все данные сессии
header("Location: authorization.php"); // Перенаправляем на страницу авторизации
exit();
?>