<?php
$products = [
    "Хлеб" => 5000,
    "Молоко" => 800,
    "Сметана" => 7000
];

echo "Стоимость Молока: " . $products["Молоко"] . " руб.<br>";

arsort($products);

echo "Продукты в порядке убывания стоимости:<br>";
foreach ($products as $product => $price) {
    echo "$product: $price руб.<br>";
}
?>
