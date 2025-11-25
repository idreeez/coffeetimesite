<?php require 'header.php';
  require_once '../connection.php'; ?>
<div class="container-fluid">
  <?php if(!empty($_SESSION["login"])) :?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Товары</h1>
        <a href="index.php" class="btn btn-primary ">На главную</a>
      </div>
      <div class="text-center">
        <a href="drinks.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Напитки</a>
        <a href="deserts.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Десерты</a>
        <a href="gifts.php" class="btn btn-primary w-50 py-3 my-3 fs-4">Наборы</a>
      </div>

    </main>
  <?php else:
    echo '<div class="text-center"><h2 class="text-center">
    <h2>Авторизуйтесь, чтобы получить доступ к админ панелю</h2>
    <a href="signin.php" class="btn btn-primary text-center">Авторизоваться</a></div>';
    endif ?>
  </div>
  </body>
</html>
