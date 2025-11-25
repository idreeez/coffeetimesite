<?php require_once '../connection.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Apanel</title>
   
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="css/signin.css" rel="stylesheet">
	  <link rel="shortcut icon" href="../img/site-icon.png" type="image/png">
	  <script src="../js/jquery-3.6.4.js"></script>
  </head>
  <body class="text-center">
    
<main class="form-signin">
    <h1 class="h3 mb-3 fw-bold">#КофеТайм</h1>
    <h2 class="h3 mb-3 fw-normal">Вход в админ панель</h2>  
  <form action="login.php" method="post">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Логин" name="login">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Пароль" name="password">
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
    <a class="w-100 btn btn-lg btn-primary" style="margin-top: 0.7rem;" href="goto.php">Вернуться на сайт</a>
  </form>
</main>


    
  </body>
</html>
