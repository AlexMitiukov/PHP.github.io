<?php
session_start();
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: authorization.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "1aviro";
$dbname = "pssip";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем список категорий
$categories = $conn->query("SELECT * FROM Категория")->fetch_all(MYSQLI_ASSOC);

// Определяем направление сортировки
$order = isset($_GET["order"]) && $_GET["order"] == "desc" ? "DESC" : "ASC";
$new_order = $order == "ASC" ? "desc" : "asc";

// --- Добавление нового товара ---
if (isset($_POST["add_product"])) {
    $name = $_POST["name"];
    $category_id = $_POST["category"];
    $price = $_POST["price"];
    $conn->query("INSERT INTO Товары (idКатегории, Название, Цена) VALUES ('$category_id', '$name', '$price')");
}

// --- Добавление новой услуги ---
if (isset($_POST["add_service"])) {
    $name = $_POST["name"];
    $category_id = $_POST["category"];
    $price = $_POST["price"];
    $conn->query("INSERT INTO Услуги (idКатегории, Название, Цена) VALUES ('$category_id', '$name', '$price')");
}

// --- Удаление товара ---
if (isset($_GET["delete_product"])) {
    $id = $_GET["delete_product"];
    $conn->query("DELETE FROM Товары WHERE IdТовара='$id'");
}

// --- Удаление услуги ---
if (isset($_GET["delete_service"])) {
    $id = $_GET["delete_service"];
    $conn->query("DELETE FROM Услуги WHERE idУслуги='$id'");
}

// Фильтр по цене
$min_price = isset($_POST["min_price"]) ? $_POST["min_price"] : 0;
$max_price = isset($_POST["max_price"]) ? $_POST["max_price"] : 100000;

// --- Поиск и фильтрация товаров ---
$search_product = isset($_POST["search_product"]) ? $_POST["search_product"] : "";
$query = "SELECT Товары.*, Категория.Название AS Категория 
          FROM Товары 
          JOIN Категория ON Товары.idКатегории = Категория.idКатегории
          WHERE Товары.Название LIKE '%$search_product%'
          AND Товары.Цена BETWEEN $min_price AND $max_price
          ORDER BY Товары.Название $order";
$products = $conn->query($query);

// --- Поиск и фильтрация услуг ---
$search_service = isset($_POST["search_service"]) ? $_POST["search_service"] : "";
$query = "SELECT Услуги.*, Категория.Название AS Категория 
          FROM Услуги 
          JOIN Категория ON Услуги.idКатегории = Категория.idКатегории
          WHERE Услуги.Название LIKE '%$search_service%'
          AND Услуги.Цена BETWEEN $min_price AND $max_price
          ORDER BY Услуги.Название $order";
$services = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Админ-панель</title>
    <script>
        function updatePriceRange(value, target) {
            document.getElementById(target).innerText = value;
        }
    </script>
</head>
<body>

<h2>Товары</h2>
<form method="post">
    <input type="text" name="search_product" placeholder="Поиск по товарам">
    
    <label>Цена от: <span id="min_price_val"><?= $min_price ?></span></label>
    <input type="range" name="min_price" min="0" max="100000" value="<?= $min_price ?>" step="100" 
           oninput="updatePriceRange(this.value, 'min_price_val')">
    
    <label>до: <span id="max_price_val"><?= $max_price ?></span></label>
    <input type="range" name="max_price" min="0" max="100000" value="<?= $max_price ?>" step="100" 
           oninput="updatePriceRange(this.value, 'max_price_val')">
    
    <input type="submit" value="Фильтр">
</form>
<a href="admin_panel.php?order=<?= $new_order ?>">Сортировать по названию (<?= $new_order == "asc" ? "А-Я" : "Я-А" ?>)</a>

<table border="1">
    <tr><th>Название</th><th>Категория</th><th>Цена</th><th>Действие</th></tr>
    <?php while ($row = $products->fetch_assoc()): ?>
        <tr>
            <form method="post">
                <input type="hidden" name="id" value="<?= $row['IdТовара'] ?>">
                <td><input type="text" name="name" value="<?= $row['Название'] ?>"></td>
                <td><?= $row['Категория'] ?></td>
                <td><input type="number" name="price" value="<?= $row['Цена'] ?>" step="0.01"></td>
                <td>
                    <input type="submit" name="update_product" value="Сохранить">
                    <a href="admin_panel.php?delete_product=<?= $row['IdТовара'] ?>">Удалить</a>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
</table>

<h3>Добавить товар</h3>
<form method="post">
    <input type="text" name="name" placeholder="Название товара" required>
    <select name="category" required>
        <option value="">Выберите категорию</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['idКатегории'] ?>"><?= $category['Название'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="price" placeholder="Цена" required>
    <input type="submit" name="add_product" value="Добавить">
</form>

<hr>

<h2>Услуги</h2>
<form method="post">
    <input type="text" name="search_service" placeholder="Поиск по услугам">
    
    <label>Цена от: <span id="min_price_val"><?= $min_price ?></span></label>
    <input type="range" name="min_price" min="0" max="100000" value="<?= $min_price ?>" step="100" 
           oninput="updatePriceRange(this.value, 'min_price_val')">
    
    <label>до: <span id="max_price_val"><?= $max_price ?></span></label>
    <input type="range" name="max_price" min="0" max="100000" value="<?= $max_price ?>" step="100" 
           oninput="updatePriceRange(this.value, 'max_price_val')">
    
    <input type="submit" value="Фильтр">
</form>
<a href="admin_panel.php?order=<?= $new_order ?>">Сортировать по названию (<?= $new_order == "asc" ? "А-Я" : "Я-А" ?>)</a>

<table border="1">
    <tr><th>Название</th><th>Категория</th><th>Цена</th><th>Действие</th></tr>
    <?php while ($row = $services->fetch_assoc()): ?>
        <tr>
            <form method="post">
                <input type="hidden" name="id" value="<?= $row['idУслуги'] ?>">
                <td><input type="text" name="name" value="<?= $row['Название'] ?>"></td>
                <td><?= $row['Категория'] ?></td>
                <td><input type="number" name="price" value="<?= $row['Цена'] ?>" step="0.01"></td>
                <td>
                    <input type="submit" name="update_service" value="Сохранить">
                    <a href="admin_panel.php?delete_service=<?= $row['idУслуги'] ?>">Удалить</a>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>