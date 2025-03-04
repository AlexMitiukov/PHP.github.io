<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = htmlspecialchars($_POST['question']);
    $phone = htmlspecialchars($_POST['phone']);
    
    $data = "Вопрос: $question\nНомер телефона: $phone\n----------------------\n";
    
    $file = 'questions.txt'; // Имя файла для записи
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    
    echo "<h2>Спасибо! Ваш вопрос был успешно отправлен.</h2>";
}
?>