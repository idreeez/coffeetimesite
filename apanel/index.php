<?php require 'header.php' ?>
<div class="container-fluid">
  <?php if(!empty($_SESSION["login"])) :?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Главная</h1>
      </div>
      <div class="text-center">
        <a href="goods.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Товары</a>
        <a href="orders.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Заказы</a>
        <a href="statistics.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Статистика</a>
        <a href="reviews.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Отзывы</a>
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
</html>