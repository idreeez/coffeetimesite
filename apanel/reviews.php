<?php require 'header.php';
require_once '../connection.php'; 
include "controllers/delete_button.php";?>

<div class="container-fluid">
  <?php if(!empty($_SESSION["login"])) :?>
    <main class="col-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Отзывы</h1>
        <a href="index.php" class="btn btn-primary ">На главную</a>
      </div>
      <div class="text-center">
        
      <h3>Отзывы, находящиеся на сайте</h3> 
      <?php
      if (isset($_POST['submit_review'])) {
        // Получаем значения полей из формы
        $id = $_POST['id'];
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];

        $img = $_POST['current_img'];
        if ($_FILES['img']['tmp_name']) {
          $img = '../img/reviews/' . basename($_FILES['img']['name']);
          move_uploaded_file($_FILES['img']['tmp_name'], $img);
        }

        // Обновляем строку в базе данных
        $stmt = $db->prepare("UPDATE reviews SET name=?, feedback=?, img=? WHERE id=?");
        $stmt->execute([$name, $feedback, $img, $id]);
        echo "Данные успешно обновлены";
        echo("<meta http-equiv='refresh' content='2'>");
      }

      // Проверяем, был ли запрос на редактирование отправлен
      if (isset($_POST['edit_review'])) {
        // Получаем ID записи, которую нужно редактировать
        $id = $_POST['id'];

        // Получаем данные о записи из базы данных
        $stmt = $db->prepare("SELECT * FROM reviews WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Выводим форму для редактирования записи
        echo "<form method='post' enctype='multipart/form-data' style='display: inline-grid;'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<label for='name'>Название</label>";
        echo "<input type='text' name='name' value='" . $row['name'] . "'>";
        echo "<label for='feedback'>Отзыв</label>";
        echo "<textarea name='feedback' style='width: 300px; height:100px;'>" . $row['feedback'] . "</textarea>";
        echo "<label for='img'>Изображение</label>";
        echo "<input type='hidden' name='current_img' value='" . $row['img'] . "'>";
        echo "<input type='file' name='img' class='mb-1'>";
        echo "<input type='submit' class='btn btn-primary' name='submit_review' value='Сохранить'>";
        echo "</form>";
      }
      ?>

      <table class="table">
        <thead class="fw-bold">
          <td>Изображение</td>
          <td>Имя</td>
          <td>Отзыв</td>
          <td>Управление</td>
        </thead>
        <tbody>
        <?php foreach ($info_reviews as $row): ?>
          <tr>
            <td>
              <img src="<?= $row['img']; ?>" width="70px">
            </td>
            <td width="150px"><?= '<p>'.$row["name"].'</p>';?></td>
            <td><?= '<p>'.$row["feedback"].'</p>';?></td>
            <td>
              <?= "<form method='post'>";
              echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
              echo "<input class='btn btn-success btn-sm' type='submit' name='edit_review' value='Изменить'>";
              echo "</form>";?>
              <a href="reviews.php?delete_id_review=<?=$row['id'];?>" class="btn btn-danger btn-sm my-1">Удалить</a>
            </td>
          </tr> 
        <?php endforeach; ?>
        </tbody>
      </table>

      <h5>Добавить новый отзыв</h5>
      <table class="table">
        <tbody>
          <tr>
            <form action="controllers/add_review.php" method="POST" enctype="multipart/form-data" style='display: inline-grid;'>
              <td>
                <label for='name'>Имя</label>
                <input type="text" name="name">
              </td>
              <td>
                <label for='feedback'>Отзыв</label>
                <textarea name="feedback" style="width: 730px;"></textarea>
              </td>
              <td>
                <label for='img'>Изображение</label>
                <input type="file" name="img">
              </td>
              <td>
                <input type="submit" class='btn btn-primary' style="margin-top: 14px;" value="Добавить">
              </td>
            </form>
          </tr>
        </tbody>
      </table>
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
