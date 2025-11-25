
<?php require 'header.php';
      require_once '../connection.php';
      include "controllers/delete_button.php";
?>
<div class="container-fluid">
  <?php if(!empty($_SESSION["login"])) :?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказы</h1>
        <a href="index.php" class="btn btn-primary ">На главную</a>
      </div>
      <div class="text-center">
        
              <h5 style="background-color: #75453e;color:white;padding: 5px;">Новые заказы</h5> 
              <table id="newOrdersTable" class="table"></table>
              <h5 style="background-color: #75453e;color:white;padding: 5px;">Выполненные заказы</h5> 
              <table id="comOrdersTable" class="table"></table>
              <h5 style="background-color: #75453e;color:white;padding: 5px;">Отмененные заказы</h5> 
              <table id="canOrdersTable" class="table"></table>
      </div>
    </main>
  <?php else:
    echo '<div class="text-center"><h2 class="text-center">
    <h2>Авторизуйтесь, чтобы получить доступ к админ панелю</h2>
    <a href="signin.php" class="btn btn-primary text-center">Авторизоваться</a>
</div>';
    endif ?>
  </div>
  </body>
  

  <script>
  // Функция для загрузки и обновления таблицы новых заказов
  function loadNewOrders() {
    $.ajax({
      url: 'controllers/load_new_orders.php',
      method: 'GET',
      success: function(response) {
        $('#newOrdersTable').html(response);
      }
    });
  }
  $(document).ready(function() {
    loadNewOrders();
  });

  setInterval(function() {
    loadNewOrders();
  }, 10000);
   // Функция для загрузки и обновления таблицы выполненных заказов
  function loadCompOrders() {
    $.ajax({
      url: 'controllers/load_completed_orders.php',
      method: 'GET',
      success: function(response) {
        $('#comOrdersTable').html(response);
      }
    });
  }
  $(document).ready(function() {
    loadCompOrders();
  });
  setInterval(function() {
    loadCompOrders();
  }, 10000);
   // Функция для загрузки и обновления таблицы отмененных заказов
   function loadCanOrders() {
    $.ajax({
      url: 'controllers/load_canceled_orders.php',
      method: 'GET',
      success: function(response) {
        $('#canOrdersTable').html(response);
      }
    }); 
  }
  $(document).ready(function() {
    loadCanOrders();
  });
  setInterval(function() {
    loadCanOrders();
  }, 10000);
</script>
</html>