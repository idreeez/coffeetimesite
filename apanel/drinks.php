<?php
require 'header.php';
require_once '../connection.php';
include "controllers/delete_button.php";
?>

<div class="container-fluid">
  <?php if (!empty($_SESSION["login"])) : ?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Товары</h1>
        <a href="goods.php" class="btn btn-primary ">Назад</a>
      </div>
      <div class="text-center">
        <h5 style="background-color: #75453e;color:white;padding: 5px;">Напитки</h5>
        <?php

        if (isset($_POST['submit_drink'])) {
          // Получаем значения полей из формы
          $id = $_POST['id'];
          $name = $_POST['name'];
          $description = $_POST['description'];
          $price200ml = $_POST['price200ml'];
          $price300ml = $_POST['price300ml'];
          $price400ml = $_POST['price400ml'];

          $img = $_POST['current_img'];
          if ($_FILES['img']['tmp_name']) {
            $img = '../img/coffee_menu/' . basename($_FILES['img']['name']);
            move_uploaded_file($_FILES['img']['tmp_name'], $img);
          }

          // Обновляем строку в базе данных
          $sql = "UPDATE drinks SET name=?, description=?, img=?, price200ml=?, price300ml=?, price400ml=? WHERE id=?";
          $stmt = $db->prepare($sql);
          $stmt->execute([$name, $description, $img, $price200ml, $price300ml, $price400ml, $id]);

          echo "Данные успешно обновлены";
          echo ("<meta http-equiv='refresh' content='2'>");
        }

        // Проверяем, был ли запрос на редактирование отправлен
        if (isset($_POST['edit_drink'])) {
          // Получаем ID записи, которую нужно редактировать
          $id = $_POST['id'];

          // Получаем данные о записи из базы данных
          $sql = "SELECT * FROM drinks WHERE id=?";
          $stmt = $db->prepare($sql);
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
          echo "<label for='price200ml'>Цена за 200мл</label>";
          echo "<input type='number' name='price200ml' value='" . $row['price200ml'] . "'>";
          echo "<label for='price300ml'>Цена за 300мл</label>";
          echo "<input type='number' name='price300ml' value='" . $row['price300ml'] . "'>";
          echo "<label for='price400ml'>Цена за 400мл</label>";
          echo "<input type='number' class='mb-1' name='price400ml' value='" . $row['price400ml'] . "'>";
          echo "<input type='submit'  class='btn btn-primary' name='submit_drink' value='Сохранить'>";
          echo "</form>";
        }
        ?>
        <table class="table">
          <thead class="fw-bold">
            <td>Изображение</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Цена за 200мл</td>
            <td>Цена за 300мл</td>
            <td>Цена за 400мл</td>
            <td>Управление</td>
          </thead>
          <tbody>
            <?php foreach ($info_drinks as $row) : ?>
              <tr>
                <td>
                  <img src="<?= $row['img']; ?>" width="70px">
                </td>
                <td><?= '<p>' . $row["name"] . '</p>'; ?></td>
                <td><?= '<p>' . $row["description"] . '</p>'; ?></td>
                <td><?= '<p>' . $row["price200ml"] . ' руб.</p>'; ?></td>
                <td><?= '<p>' . $row["price300ml"] . ' руб.</p>'; ?></td>
                <td><?= '<p>' . $row["price400ml"] . ' руб.</p>'; ?></td>
                <td><?= "<form method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input class='btn btn-success btn-sm'type='submit' name='edit_drink' value='Изменить'>";
                    echo "</form>"; ?>
                  <a href="drinks.php?delete_id_drink=<?= $row['id']; ?>" class="btn btn-danger btn-sm my-1">Удалить</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </tbody>
        </table>

        <h5>Добавить новый напиток</h5>
        <table class="table">
          <tbody>
            <tr>
              <form action="controllers/add_drink.php" method="POST" enctype="multipart/form-data" style='display: inline-grid;'>
                <td>
                  <label for='name'>Название</label>
                  <input type="text" name="name"></td>
                <td><label for='description'>Описание</label>
                  <textarea name="description"></textarea></td>
                <td><label for='img'>Изображение</label>
                  <input type="file" name="img"></td>
                <td><label for='price200ml'>Цена за 200мл</label>
                  <input type="number" name="price200ml"></td>
                <td><label for='price300ml'>Цена за 300мл</label>
                  <input type="number" name="price300ml"></td>
                <td>
                  <label for='price400ml'>Цена за 400мл</label>
                  <input type="number" class='mb-1' name="price400ml"></td>
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