<?php
$host = "localhost";
$dbLogin = "root";
$dbPassword = "";
$dbname = "coffeetime";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $dbLogin, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $info_drinks = fetchData($db, "SELECT * FROM drinks");
    $info_deserts = fetchData($db, "SELECT * FROM deserts");
    $info_gifts = fetchData($db, "SELECT * FROM gifts");
    $info_reviews = fetchData($db, "SELECT * FROM reviews");
    $info_orders = fetchData($db, "SELECT * FROM orders ORDER BY orderDate DESC");
    $info_ordersItems = fetchData($db, "SELECT * FROM ordersItems");

} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

function fetchData($db, $query)
{
    $result = [];
    try {
        $statement = $db->query($query);
        if ($statement) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            print_r($db->errorInfo());
        }
    } catch (PDOException $e) {
        print_r($db->errorInfo());
    }
    return $result;
}
?>