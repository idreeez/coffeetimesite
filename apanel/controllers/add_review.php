<?php
// Подключение к базе данных
require_once '../../connection.php';

// Получение данных из формы
$name = $_POST['name'];
$feedback = $_POST['feedback'];
if ($_FILES['img']['size'] > 0) {
    $img = '../../img/reviews/' . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $img);
} else {
    $img = '../../img/reviews/!default.png';
}

try {
    // Добавление новой записи в базу данных
    $insertReviewQuery = "INSERT INTO reviews (name, feedback, img) VALUES (:name, :feedback, :img)";
    $reviewStatement = $db->prepare($insertReviewQuery);
    $reviewStatement->bindParam(':name', $name);
    $reviewStatement->bindParam(':feedback', $feedback);
    $reviewStatement->bindParam(':img', $img);
    $reviewStatement->execute();

    header("Refresh:2; '../reviews.php'");
    echo "Новый отзыв успешно добавлен!<br>";
    echo "<link rel='stylesheet' href='../../css/bootstrap.css'>";
    echo "<link href='../css/dashboard.css' rel='stylesheet'>";
    echo "<a class='btn btn-primary' href='../reviews.php'>Назад</a>";
} catch (PDOException $e) {
    echo "Ошибка при добавлении отзыва: " . $e->getMessage();
}
?>
