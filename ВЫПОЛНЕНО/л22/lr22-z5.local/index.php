<?php
$s1 = "Митюков";
$s2 = "Гродно";

$length_s1 = mb_strlen($s1);
echo "Длина строки s1: $length_s1<br>";

$concatenated = $s1 . " " . $s2;
echo "Сцепленные строки: $concatenated<br>";

$upper_s2 = mb_strtoupper($s2);
echo "Строка s2 в верхнем регистре: $upper_s2<br>";
?>