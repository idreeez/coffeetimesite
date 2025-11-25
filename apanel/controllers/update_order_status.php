<?php
require_once '../../connection.php';

if (isset($_POST['orderId'])) {
  $orderId = $_POST['orderId'];
  $completionTime = date('Y-m-d H:i:s');

  // Обновление статуса и времени выполнения заказа в базе данных
  $query = "UPDATE orders SET orderStatus = 'Заказ выполнен', completionTime = :completionTime WHERE id = :orderId";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':completionTime', $completionTime);
  $stmt->bindParam(':orderId', $orderId);
  $stmt->execute();

  echo 'success'; // Возвращаем успех как ответ на AJAX-запрос
}
$db = null;
?>