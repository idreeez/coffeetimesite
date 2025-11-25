<?php
// Подключение к базе данных и другие необходимые настройки
require_once '../../connection.php';
// Получение данных о новых заказах из базы данных
// if (isset($_GET['date'])) {
//   $selectedDate = $_GET['date'];
// } else {
//   // Если дата не выбрана, используйте текущую дату
//   $selectedDate = date('Y-m-d');
// }
$selectedDate = date('Y-m-d');
// Использование выбранной даты для фильтрации заказов
$query = "SELECT * FROM orders WHERE orderStatus = 'Новый заказ' AND orderDate >= :selectedDate ORDER BY orderDate DESC";
$stmt = $db->prepare($query);
$stmt->bindParam(':selectedDate', $selectedDate);
$stmt->execute();
$info_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Генерация HTML-содержимого таблицы новых заказов
if (empty($info_orders)) {
  echo '<p>Нет новых заказов</p>';
} else {
$output = '<thead class="fw-bold">';
$output .= '<td>Заказ получен</td>';
$output .= '<td>Номер заказа</td>';
$output .= '<td>Имя покупателя</td>';
$output .= '<td>Номер покупателя</td>';
$output .= '<td>Почта покупателя</td>';
$output .= '<td>Заказ</td>';
$output .= '<td>Общая сумма заказа</td>';
$output .= '<td>Управление</td>';
$output .= '</thead>';
$output .= '<tbody>';

foreach ($info_orders as $row) {
  $output .= '<tr>';
  $output .= '<td>' . $row["orderDate"] . '</td>';
  $output .= '<td>' . $row["id"] . '</td>';
  $output .= '<td>' . $row["userName"] . '</td>';
  $output .= '<td>' . $row["userTel"] . '</td>';
  $output .= '<td>' . $row["userEmail"] . '</td>';
  $output .= '<td>';
  $output .= '<table class="table table-primary" border="1">';
  $output .= '<thead class="fw-bold">';
  $output .= '<td>Товар</td>';
  $output .= '<td>Размер (мл)</td>';
  $output .= '<td>Цена</td>';
  $output .= '<td>Количество</td>';
  $output .= '<td>Общая цена</td>';
  $output .= '</thead>';

  // Получение данных о товарах для данного заказа
  $query = "SELECT * FROM ordersItems WHERE orderId = :orderId";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':orderId', $row['id']);
  $stmt->execute();
  $info_ordersItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($info_ordersItems as $data) {
    $output .= '<tr>';
    $output .= '<td>' . $data["productName"] . '</td>';
    $output .= '<td>' . $data["productSize"] . '</td>';
    $output .= '<td>' . $data["productPrice"] . '₽</td>';
    $output .= '<td>' . $data["productQuantity"] . ' шт</td>';
    $output .= '<td>' . $data["productPriceCommon"] . '₽</td>';
    $output .= '</tr>';
  }

  $output .= '</table>';
  $output .= '</td>';
  $output .= '<td>' . $row["finalPrice"] . '</td>';
  $output .= '<td>';
  $output .= '<form method="post" action="load_new_orders.php">';
  $output .= '<input type="submit" class="btn btn-success btn-sm my-1 order-completed-btn" data-order-id="'.$row['id'].'" value="Заказ готов"> <br>';
  $output .= '<input type="submit" class="btn btn-danger btn-sm my-1 order-canceled-btn" data-order-id="'.$row['id'].'" value="Отменить заказ">';
  $output .= '</form>';
  $output .= '</td>';
  $output .= '</tr>';
}

$output .= '</tbody>';

// Вывод HTML-содержимого таблицы новых заказов
echo $output;
}
?>
  <script>
    $(document).ready(function() {
      $('.order-completed-btn').click(function(e) {
        e.preventDefault();

        var orderId = $(this).data('order-id');

        // AJAX-запрос для обновления статуса заказа
        $.ajax({
          url: 'controllers/update_order_status.php',
          method: 'POST',
          data: { orderId: orderId },
          success: function(response) {
            // Обновление информации на странице после успешного выполнения запроса
            var row = $('.order-completed-btn[data-order-id="' + orderId + '"]').closest('tr');
            row.fadeOut('slow', function() {
              row.remove();
            });
          },
          error: function() {
            alert('Ошибка при обновлении статуса заказа');
          }
        });
      });
    });
  </script>
    <script>
    $(document).ready(function() {
      $('.order-canceled-btn').click(function(e) {
        e.preventDefault();

        var orderId = $(this).data('order-id');

        // AJAX-запрос для обновления статуса заказа
        $.ajax({
          url: 'controllers/cancel_order_status.php',
          method: 'POST',
          data: { orderId: orderId },
          success: function(response) {
            // Обновление информации на странице после успешного выполнения запроса
            var row = $('.order-canceled-btn[data-order-id="' + orderId + '"]').closest('tr');
            row.fadeOut('slow', function() {
              row.remove();
            });
          },
          error: function() {
            alert('Ошибка при обновлении статуса заказа');
          }
        });
      });
    });
  </script>