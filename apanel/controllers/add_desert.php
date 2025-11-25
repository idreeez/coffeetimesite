<?php
// Подключение к базе данных
require_once '../../connection.php';

// Получение данных из формы
$name = $_POST['name'];
$description = $_POST['description'];
if ($_FILES['img']['size'] > 0) {
    $img = '../../img/deserts_menu/' . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $img);
} else {
    $img = '../../img/default_goods.png';
}
$price = $_POST['price'];

try {
    // Добавление новой записи в базу данных
    $insertDessertQuery = "INSERT INTO deserts (name, description, img, price) VALUES (:name, :description, :img, :price)";
    $dessertStatement = $db->prepare($insertDessertQuery);
    $dessertStatement->bindParam(':name', $name);
    $dessertStatement->bindParam(':description', $description);
    $dessertStatement->bindParam(':img', $img);
    $dessertStatement->bindParam(':price', $price);
    $dessertStatement->execute();

    header("Refresh:2; '../deserts.php'");
    echo "Новый десерт успешно добавлен!<br>";
    echo "<link rel='stylesheet' href='../../css/bootstrap.css'>";
    echo "<link href='../css/dashboard.css' rel='stylesheet'>";
    echo "<a class='btn btn-primary' href='../deserts.php'>Назад</a>";
} catch (PDOException $e) {
    echo "Ошибка при добавлении десерта: " . $e->getMessage();
}
?>
