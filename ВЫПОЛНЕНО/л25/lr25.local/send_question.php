<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST["question"];
    $to = "wolfaleg39@gmail.com";
    $subject = "Вопрос с вашего сайта";
    $message = "Вопрос: " . $question;
    $headers = "From: alexmit16.04@gmail.com" . "\r\n" .
               "Reply-To: alexmit16.04@gmail.com" . "\r\n" . 
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<p style='color: green;'>Ваш вопрос успешно отправлен!</p>";
        echo "<p><a href='index.php'>Вернуться на главную</a></p>";
    } else {
        echo "<p style='color: red;'>Ошибка при отправке вопроса.</p>";
        echo "<p><a href='index.php'>Вернуться на главную</a></p>";
    }
} else {
    header("Location: index.php"); // Если зашли напрямую, перенаправляем
    exit();
}
?>