<?php require 'header.php';
require_once '../connection.php';
include "controllers/delete_button.php"; ?>

<div class="container-fluid">
  <?php if (!empty($_SESSION["login"])) : ?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Товары</h1>
        <a href="goods.php" class="btn btn-primary ">Назад</a>
      </div>
      <div class="text-center">
        <h5 style="background-color: #75453e;color:white;padding: 5px;">Подарочные наборы</h5>
        <?php
        if (isset($_POST['submit_gift'])) {
          // Получаем значения полей из формы
          $id = $_POST['id'];
          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];

          $img = $_POST['current_img'];
          if ($_FILES['img']['tmp_name']) {
            $img = '../img/giftboxes_menu/' . basename($_FILES['img']['name']);
            move_uploaded_file($_FILES['img']['tmp_name'], $img);
          }

          // Обновляем строку в базе данных
          $stmt = $db->prepare("UPDATE gifts SET name=?, description=?, img=?, price=? WHERE id=?");
          $stmt->execute([$name, $description, $img, $price, $id]);
          echo "<meta http-equiv='refresh' content='1'>";
          echo "Данные успешно обновлены";
        }

        // Проверяем, был ли запрос на редактирование отправлен
        if (isset($_POST['edit_gift'])) {
          // Получаем ID записи, которую нужно редактировать
          $id = $_POST['id'];

          // Получаем данные о записи из базы данных
          $stmt = $db->prepare("SELECT * FROM gifts WHERE id=?");
          $stmt->execute([$id]);
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Выводим форму для редактирования записи
          echo "<form method='post' enctype='multipart/form-data' style='display: inline-grid;'>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
          echo "<label for='name'>Название</label>";
          echo "<input type='text' name='name' value='" . $row['name'] . "'>";
          echo "<label for='description'>Описание</label>";
          echo "<textarea name='description' style='width: 300px; height:100px;'>" . $row['description'] . "</textarea>";
          echo "<label for='img'>Изображение</label>";
          echo "<input type='hidden' name='current_img' value='" . $row['img'] . "'>";
          echo "<input type='file' name='img'>";
          echo "<label for='price'>Цена</label>";
          echo "<input type='number' class='mb-1' name='price' value='" . $row['price'] . "'>";
          echo "<input type='submit' class='btn btn-primary' name='submit_gift' value='Сохранить'>";
          echo "<input type='hidden' name='scroll' value='4'>";
          echo "</form>";
        }
        ?>
        <table class="table">
          <thead class="fw-bold">
            <td>Изображение</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Цена</td>
            <td>Управление</td>
          </thead>
          <tbody>
            <?php foreach ($info_gifts as $row) : ?>
              <tr>
                <td>
                  <img src="<?= $row['img']; ?>" width="120px">
                </td>
                <td><?= '<p>' . $row["name"] . '</p>'; ?></td>
                <td><?= '<p>' . $row["description"] . '</p>'; ?></td>
                <td><?= '<p>' . $row["price"] . ' руб.</p>'; ?></td>
                <td>
                  <?= "<form method='post'>";
                  echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                  echo "<input class='btn btn-success btn-sm'type='submit' name='edit_gift' value='Изменить'>";
                  echo "</form>"; ?>
                  <a href="gifts.php?delete_id_gift=<?= $row['id']; ?>" class="btn btn-danger btn-sm my-1">Удалить</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <h5>Добавить новый набор</h5>
        <table class="table">
          <tbody>
            <tr>
              <form action="controllers/add_gift.php" method="POST" enctype="multipart/form-data" style='display: inline-grid !important;'>
                <td>
                  <label for='name'>Название</label>
                  <input type="text" name="name"></td>
                <td><label for='description'>Описание</label>
                  <textarea name="description" style='width:500px;'></textarea></td>
                <td><label for='img'>Изображение</label>
                  <input type="file" name="img"></td>
                <td><label for='price'>Цена</label>
                  <input type="number" class="mb-1" name="price"></td>
                <td><input type="submit" class='btn btn-primary' value="Добавить"></td>
              </form>
            </tr>
          </tbody>
        </table>
      </div>

    </main>
  <?php else :
    echo '<div class="text-center"><h2 class="text-center">
    <h2>Авторизуйтесь, чтобы получить доступ к админ панели</h2>
    <a href="signin.php" class="btn btn-primary text-center">Авторизоваться</a></div>';
  endif ?>
</div>
</body>
</html>