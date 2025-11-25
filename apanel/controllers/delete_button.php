<?php
    require_once '../connection.php';
    //Удаление товаров
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id_drink'])){
    $id = $_GET['delete_id_drink'];
    delete('drinks', $id);
    header('Location:drinks.php');
    }
     if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id_desert'])){
    header('Location:deserts.php');
    $id = $_GET['delete_id_desert'];
    delete('deserts', $id);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id_gift'])){
    $id = $_GET['delete_id_gift'];
    delete('gifts', $id);
    header('Location:gifts.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id_review'])){
    header('Location:reviews.php');
    $id = $_GET['delete_id_review'];
    delete('reviews', $id);
    }
    function delete($table, $id) {
        global $db;
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        $db= null;
        }
?>