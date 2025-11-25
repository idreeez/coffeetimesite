<?php
// Подключение к базе данных
require_once '../../connection.php';

// Получение данных из формы
$name = $_POST['name'];
$description = $_POST['description'];
if ($_FILES['img']['size'] > 0) {
    $img = '../../img/giftboxes_menu/' . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $img);
} else {
    $img = '../../img/default_goods.png';
}
$price = $_POST['price'];

try {
    // Добавление новой записи в базу данных
    $insertGiftQuery = "INSERT INTO gifts (name, description, img, price) VALUES (:name, :description, :img, :price)";
    $giftStatement = $db->prepare($insertGiftQuery);
    $giftStatement->bindParam(':name', $name);
    $giftStatement->bindParam(':description', $description);
    $giftStatement->bindParam(':img', $img);
    $giftStatement->bindParam(':price', $price);
    $giftStatement->execute();

    header("Refresh:2; '../gifts.php'");
    echo "Новый набор успешно добавлен!<br>";
    echo "<link rel='stylesheet' href='../../css/bootstrap.css'>";
    echo "<link href='../css/dashboard.css' rel='stylesheet'>";
    echo "<a class='btn btn-primary' href='../gifts.php'>Назад</a>";
} catch (PDOException $e) {
    echo "Ошибка при добавлении набора: " . $e->getMessage();
}
?>
