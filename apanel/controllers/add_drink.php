<?php
// Подключение к базе данных
require_once '../../connection.php';

// Получение данных из формы
$name = $_POST['name'];
$description = $_POST['description'];
if ($_FILES['img']['size'] > 0) {
    $img = '../../img/coffee_menu/' . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $img);
} else {
    $img = '../../img/default_goods.png';
}
$price200ml = $_POST['price200ml'];
$price300ml = $_POST['price300ml'];
$price400ml = $_POST['price400ml'];

try {
    // Добавление новой записи в базу данных
    $insertDrinkQuery = "INSERT INTO drinks (name, description, img, price200ml, price300ml, price400ml) VALUES (:name, :description, :img, :price200ml, :price300ml, :price400ml)";
    $drinkStatement = $db->prepare($insertDrinkQuery);
    $drinkStatement->bindParam(':name', $name);
    $drinkStatement->bindParam(':description', $description);
    $drinkStatement->bindParam(':img', $img);
    $drinkStatement->bindParam(':price200ml', $price200ml);
    $drinkStatement->bindParam(':price300ml', $price300ml);
    $drinkStatement->bindParam(':price400ml', $price400ml);
    $drinkStatement->execute();

    header("Refresh:2; '../drinks.php'");
    echo "Новый напиток успешно добавлен!<br>";
    echo "<link rel='stylesheet' href='../../css/bootstrap.css'>";
    echo "<link href='../css/dashboard.css' rel='stylesheet'>";
    echo "<a class='btn btn-primary' href='../drinks.php'>Назад</a>";
} catch (PDOException $e) {
    echo "Ошибка при добавлении напитка: " . $e->getMessage();
}
?>
