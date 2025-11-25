<?php
require 'header.php';
require_once '../connection.php';

$topProducts = array();
$productSales = array();
$orderStats = array();

if (!empty($_SESSION["login"])) {
    try {
        // Топ продаваемых товаров за последний месяц
        $query = "SELECT oi.productName, SUM(oi.productQuantity) AS sales, oi.productSize
            FROM ordersItems AS oi
            INNER JOIN orders AS o ON oi.orderId = o.Id
            WHERE o.orderStatus = 'Заказ выполнен' AND MONTH(o.orderDate) = MONTH(CURRENT_DATE) AND YEAR(o.orderDate) = YEAR(CURRENT_DATE)
            GROUP BY oi.productName, oi.productSize
            ORDER BY sales DESC
            LIMIT 10";

        $topProductsStatement = $db->prepare($query);
        $topProductsStatement->execute();

        while ($row = $topProductsStatement->fetch(PDO::FETCH_ASSOC)) {
            $productName = $row["productName"];
            $sales = $row["sales"];
            $productSize = $row["productSize"];

            $topProducts[$productName] = array(
                "sales" => $sales,
                "productSize" => $productSize
            );
        }

        // Лучшие продаваемые товары за все время
        $query = "SELECT oi.productName, oi.productSize, SUM(oi.productQuantity) AS sales
            FROM ordersItems AS oi
            INNER JOIN orders AS o ON oi.orderId = o.Id
            WHERE o.orderStatus = 'Заказ выполнен'
            GROUP BY oi.productName, oi.productSize
            ORDER BY sales DESC
            LIMIT 10";

        $productSalesStatement = $db->prepare($query);
        $productSalesStatement->execute();

        while ($row = $productSalesStatement->fetch(PDO::FETCH_ASSOC)) {
            $productName = $row["productName"];
            $productSize = $row["productSize"];
            $sales = $row["sales"];

            if (!isset($productSales[$productName])) {
                $productSales[$productName] = array(
                    "sales" => 0,
                    "bestSize" => ""
                );
            }

            // Обновить данные, если текущее количество продаж больше предыдущего
            if ($sales > $productSales[$productName]["sales"]) {
                $productSales[$productName]["sales"] = $sales;
                $productSales[$productName]["bestSize"] = $productSize;
            }
        }

        // Динамика заказов за год
        $query = "SELECT DATE_FORMAT(orderDate, '%M') AS month, SUM(CASE WHEN orderStatus = 'Заказ выполнен' THEN 1 ELSE 0 END) AS completedCount, SUM(CASE WHEN orderStatus = 'Заказ отменен' THEN 1 ELSE 0 END) AS canceledCount FROM orders GROUP BY month";

        $orderStatsStatement = $db->prepare($query);
        $orderStatsStatement->execute();

        while ($row = $orderStatsStatement->fetch(PDO::FETCH_ASSOC)) {
            $month = $row["month"];
            $completedCount = $row["completedCount"];
            $canceledCount = $row["canceledCount"];

            $orderStats[$month] = array(
                "Заказ выполнен" => $completedCount,
                "Заказ отменен" => $canceledCount
            );
        }
    } catch (PDOException $e) {
        echo "Ошибка при выполнении запроса: " . $e->getMessage();
    }
}

$db = null;
?>

<div class="container-fluid">
    <?php if (!empty($_SESSION["login"])) : ?>
        <main class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Статистика</h1>
                <a href="index.php" class="btn btn-primary ">На главную</a>
            </div>
            <div class="text-center">
                <h5 style="background-color: #75453e;color:white;padding: 5px;">Топ продаваемых товаров за последний месяц</h5>
                <div class="d-flex">
                    <div class="col-6">
                        <table class="table">
                            <thead class="fw-bold">
                                <tr>
                                    <th>Название товара</th>
                                    <th>Количество продаж</th>
                                    <th>Часто выбираемый объем напитка (мл)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($topProducts as $productName => $data) {
                                    $sales = $data['sales'];
                                    $productSize = $data['productSize'];
                                    echo '<tr>';
                                    echo '<td>' . $productName . '</td>';
                                    echo '<td>' . $sales . '</td>';
                                    echo '<td>' . $productSize . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6" style="position: relative;height: 400px;">
                        <div id="topSalesChart"></div>
                    </div>
                </div>

                <h5 style="background-color: #75453e;color:white;padding: 5px;">Лучшие продаваемые товары за все время</h5>
                <div class="d-flex">
                    <div class="col-6">
                        <table class="table">
                            <thead class="fw-bold">
                                <tr>
                                    <td>Название товара</td>
                                    <td>Количество продаж</td>
                                    <td>Часто выбираемый объем напитка (мл)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productSales as $productName => $data) {
                                    $sales = $data["sales"];
                                    $bestSize = $data["bestSize"];
                                    echo "<tr>";
                                    echo "<td>" . $productName . "</td>";
                                    echo "<td>" . $sales . "</td>";
                                    echo "<td>" . $bestSize . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6" style="position: relative;height: 400px;">
                        <div id="salesChart"></div>
                    </div>
                </div>

                <h5 style="background-color: #75453e;color:white;padding: 5px;">Динамика заказов за год</h5>
                <?php
                $data = array();
                foreach ($orderStats as $month => $statusCounts) {
                    $data[] = array(
                        (string) $month,
                        (int) $statusCounts["Заказ выполнен"],
                        (int) $statusCounts["Заказ отменен"]
                    );
                }
                echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load("current", {"packages":["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
        
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn("string", "Месяц");
                    data.addColumn("number", "Выполненные заказы");
                    data.addColumn("number", "Отмененные заказы");
        
                    data.addRows(' . json_encode($data) . ');
        
                    var options = {
                      title: "",
                      curveType: "",
                      legend: { position: "bottom" }
                    };
        
                    var chart = new google.visualization.LineChart(document.getElementById("chart_div"));
        
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_div" style="width: 100%; height: 400px;"></div>';
                ?>
            </div>
        </main>
    <?php else :
        echo '<div class="text-center"><h2 class="text-center">
        <h2>Авторизуйтесь, чтобы получить доступ к админ панелю</h2>
        <a href="signin.php" class="btn btn-primary text-center">Авторизоваться</a>
      </div>';
    endif ?>
</div>
</body>
<script>
    // Загрузка библиотеки Google Charts
    google.charts.load("current", { "packages": ["corechart"] });
    google.charts.setOnLoadCallback(drawSalesChart);
    google.charts.setOnLoadCallback(drawTopSalesChart);

    function drawSalesChart() {
        // Создание таблицы данных
        var salesData = new google.visualization.DataTable();
        salesData.addColumn("string", "Название товара");
        salesData.addColumn("number", "Количество продаж");

        <?php foreach ($productSales as $productName => $data) {
            $sales = $data["sales"];
            $bestSize = $data["bestSize"];
            echo "salesData.addRow(['$productName', $sales]);";
        } ?>

        // Опции для круговой диаграммы
        var salesOptions = {
            title: "",
            is3D: true,
        };

        // Создание и отображение круговой диаграммы
        var salesChart = new google.visualization.PieChart(document.getElementById("salesChart"));
        salesChart.draw(salesData, salesOptions);
    }

    function drawTopSalesChart() {
        // Создание таблицы данных
        var topSalesData = new google.visualization.DataTable();
        topSalesData.addColumn("string", "Название товара");
        topSalesData.addColumn("number", "Количество продаж");

        <?php foreach ($topProducts as $productName => $data) {
            $sales = $data["sales"];
            $productSize = $data["productSize"];
            echo "topSalesData.addRow(['$productName', $sales]);";
        } ?>

        // Опции для круговой диаграммы
        var topSalesOptions = {
            title: "",
            is3D: true,
        };

        // Создание и отображение круговой диаграммы
        var topSalesChart = new google.visualization.PieChart(document.getElementById("topSalesChart"));
        topSalesChart.draw(topSalesData, topSalesOptions);
    }
</script>

</html>
