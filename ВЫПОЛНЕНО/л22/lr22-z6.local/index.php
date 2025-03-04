<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Расчет Z</title>
    </head>
    <body>

    <h1>Введите значения для расчета Z</h1>

    <form method="post" action="">
        <label for="x">Введите значение x:</label>
        <input type="number" step="any" name="x" id="x" required>
        <br><br>
        <label for="y">Введите значение y:</label>
        <input type="number" step="any" name="y" id="y" required>
        <br><br>
        <input type="submit" value="Рассчитать">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем значения из формы
        $x = (float)$_POST['x'];
        $y = (float)$_POST['y'];

        // Пользовательская функция для расчета z
        function calculateZ($x, $y) {
            // Проверяем, чтобы x^2 + 0.1 не равнялось нулю, чтобы избежать деления на ноль
            if ($x * $x + 0.1 == 0) {
                return "Ошибка: деление на ноль.";
            }

            // Вычисляем z по заданной формуле
            $numerator = abs($x * $x - 0.1);
            $denominator = $x * $x + 0.1;
            
            // sqrt((abs(x^2 - 0.1))/(x^2 + 0.1))
            $sqrtPart = sqrt($numerator / $denominator);

            // (x + y^3)/(log по основанию 8 (1+x^2))
            $logPart = log(1 + $x * $x, 8); // Логарифм по основанию 8
            $fractionPart = ($x + pow($y, 3)) / $logPart;

            // Суммируем обе части
            $z = $sqrtPart + $fractionPart;

            return $z;
        }

        // Вызываем функцию и выводим результат
        $result = calculateZ($x, $y);
        echo "<h2>Результат расчета z: $result</h2>";
    }
    ?>

    </body>
</html>